<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Chatify\Facades\ChatifyMessenger as Chatify;
use App\Models\ReportFacilities;
use App\Models\User;

class CustomChatController extends Controller
{
    public function index(Request $request)
    {
        $report_id = $request->report_id;
        $user_id = $request->user_id;
        $report = null;

        if ($report_id) {
            $report = ReportFacilities::findOrFail($report_id);
        }

        // Default ID logic based on report or direct hit
        $id = $user_id;
        if (!$id && $report) {
            $id = ($report->user_id == auth()->id()) 
                ? (User::where('role', 'admin')->first()->id ?? 1) 
                : $report->user_id;
        }

        return view('vendor.Chatify.pages.app', [
            'id' => $id ?? 0, // 0 for select a chat hint
            'report' => $report,
            'messengerColor' => '#2180f3',
            'dark_mode' => 'light'
        ]);
    }

    public function sendMessage(Request $request)
    {
        $report_id = $request->report_id;
        $user_id = $request->id; // Chatify usually uses 'id' for receiver in requests

        $receiver_id = null;
        if ($report_id) {
            $report = ReportFacilities::findOrFail($report_id);
            if (auth()->user()->role !== 'admin' && auth()->id() !== $report->user_id) {
                return response()->json(['error' => 'Unauthorized'], 403);
            }
            $receiver_id = ($report->user_id == auth()->id()) 
                ? (User::where('role', 'admin')->first()->id ?? 1) 
                : $report->user_id;
        } else {
            $receiver_id = $user_id;
            if (!$receiver_id) {
                 return response()->json(['error' => 'Receiver ID is required'], 400);
            }
        }

        $message = Chatify::newMessage([
            'from_id' => auth()->id(),
            'to_id' => $receiver_id,
            'body' => $request->message,
            'report_facility_id' => $report_id, // can be null
        ]);

        return response()->json([
            'status' => 'success',
            'error' => 0,
            'message' => Chatify::messageCard($message),
            'tempID' => $request->temporaryMsgId,
        ]);
    }

    public function fetch(Request $request)
    {
        $report_id = $request->report_id;
        $user_id = $request->user_id;

        $query = Chatify::fetchMessagesQuery($user_id);

        if ($report_id) {
            $report = ReportFacilities::findOrFail($report_id);
            if (auth()->user()->role !== 'admin' && auth()->id() !== $report->user_id) {
                return response()->json(['error' => 'Unauthorized'], 403);
            }
            $query->where('report_facility_id', $report_id);
        }

        $messages = $query->get();

        $allMessages = "";
        foreach ($messages as $message) {
            $allMessages .= Chatify::messageCard($message);
        }

        return response()->json([
            'messages' => $allMessages,
            'last_page' => 1, // Simple pagination for now
        ]);
    }
}
