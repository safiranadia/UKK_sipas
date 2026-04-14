<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Chatify\Facades\ChatifyMessenger as Chatify;
use App\Models\ReportFacilities;
use App\Models\User;

class CustomChatController extends Controller
{
    public function index(Request $request, $id = null)
    {
        $report_id = $request->report_id;
        $report = null;

        // If explicitly requested by report_id
        if ($report_id) {
            $report = ReportFacilities::with('categoryReport')->find($report_id);
            if ($report && !$id) {
                // If student, talk to admin. If admin, talk to student who reported.
                $admin = User::where('role', 'admin')->first();
                $id = (auth()->id() == $report->user_id) 
                    ? ($admin->id ?? 1) 
                    : $report->user_id;
            }
        } 
        
        // AUTO-CONTEXT DETECTION:
        // If no report_id but we are viewing a specific user's chat,
        // find the LATEST report associated with messages between these two users.
        if (!$report && $id) {
            $latestReportId = \Illuminate\Support\Facades\DB::table('ch_messages')
                ->where(function($q) use ($id) {
                    $q->where('from_id', auth()->id())->where('to_id', $id);
                })
                ->orWhere(function($q) use ($id) {
                    $q->where('from_id', $id)->where('to_id', auth()->id());
                })
                ->whereNotNull('report_facility_id')
                ->orderBy('created_at', 'desc')
                ->value('report_facility_id');
            
            if ($latestReportId) {
                $report = ReportFacilities::with('categoryReport')->find($latestReportId);
            }
        }

        return view('vendor.Chatify.pages.app', [
            'id'             => (int) ($id ?? 0),
            'report'         => $report,
            'messengerColor' => '#2180f3',
            'dark_mode'      => 'light',
        ]);
    }

    public function sendMessage(Request $request)
    {
        $report_id  = $request->report_id;
        // Chatify JS always sends the peer's id as 'id' in the POST body
        $peer_id    = $request->id;

        // When a report is involved, double-check receiver from report context
        if ($report_id) {
            $report      = ReportFacilities::findOrFail($report_id);
            $admin_id    = User::where('role', 'admin')->value('id') ?? 1;
            $peer_id     = (auth()->id() == $report->user_id) ? $admin_id : $report->user_id;
        }

        if (!$peer_id) {
            return response()->json(['status' => '200', 'error' => ['status' => 1, 'message' => 'Receiver not found']]);
        }

        $message = Chatify::newMessage([
            'from_id'    => auth()->id(),
            'to_id'      => $peer_id,
            'body'       => htmlentities(trim($request->message ?? ''), ENT_QUOTES, 'UTF-8'),
            'attachment' => null,
        ]);

        // Chatify's newMessage() doesn't support extra columns — save manually
        if ($report_id) {
            $message->report_facility_id = $report_id;
            $message->save();
        }

        $messageData = Chatify::parseMessage($message);
        // Attach report info for in-bubble preview
        if ($message->report_facility_id) {
            $messageData['report'] = ReportFacilities::with('categoryReport')->find($message->report_facility_id);
        }

        // Push real-time notification via Pusher (if configured)
        if (auth()->id() != $peer_id) {
            Chatify::push("private-chatify.{$peer_id}", 'messaging', [
                'from_id' => auth()->id(),
                'to_id'   => $peer_id,
                'message' => Chatify::messageCard($messageData, 'default'),
            ]);
        }

        // Return in EXACT same format as Chatify's native send() so JS spinner stops.
        return response()->json([
            'status'  => '200',
            'error'   => 0,
            'message' => Chatify::messageCard($messageData),
            'tempID'  => $request->temporaryMsgId,
        ]);
    }

    public function reportChat($id)
    {
        return redirect()->route('starbhak', ['report_id' => $id]);
    }

    public function fetch(Request $request)
    {
        $perPage   = 30;
        $report_id = $request->report_id;
        $peer_id   = $request->id;

        $query = Chatify::fetchMessagesQuery($peer_id)->latest();

        // If tied to a report, filter by report_facility_id too
        if ($report_id) {
            $query->where('report_facility_id', $report_id);
        }

        $messages      = $query->paginate($request->per_page ?? $perPage);
        $totalMessages = $messages->total();
        $lastPage      = $messages->lastPage();

        $response = [
            'total'           => $totalMessages,
            'last_page'       => $lastPage,
            'last_message_id' => collect($messages->items())->last()->id ?? null,
            'messages'        => '',
        ];

        if ($totalMessages < 1) {
            $response['messages'] = '<p class="message-hint center-el"><span>Say \'hi\' and start messaging</span></p>';
            return response()->json($response);
        }

        $allMessages = '';
        foreach (collect($messages->items())->sortBy('created_at') as $message) {
            $messageData = Chatify::parseMessage($message);
            // Attach report info for in-bubble preview
            if ($message->report_facility_id) {
                $messageData['report'] = ReportFacilities::with('categoryReport')->find($message->report_facility_id);
            }
            $allMessages .= Chatify::messageCard($messageData);
        }
        $response['messages'] = $allMessages;
        return response()->json($response);
    }
}
