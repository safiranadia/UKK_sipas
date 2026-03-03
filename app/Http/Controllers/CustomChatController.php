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
        $report = ReportFacilities::findOrFail($request->report_id);

        if ($report->status === 'resolved') {
            return back()->with('error', 'Chat sudah ditutup.');
        }

        return view('vendor.chatify.pages.app', [
            'id' => $request->user_id,
            'report' => $report
        ]);
    }
    
    public function sendMessage(Request $request)
    {
        $report = ReportFacilities::findOrFail($request->report_id);

        // ❌ Blok kalau sudah resolved
        if ($report->status === 'resolved') {
            return response()->json([
                'error' => 'Chat sudah ditutup karena laporan selesai.'
            ], 403);
        }

        // Pastikan hanya admin atau pemilik laporan
        if (
            auth()->user()->role !== 'admin' &&
            auth()->id() !== $report->user_id
        ) {
            abort(403);
        }

        $receiver_id = $report->user_id == auth()->id()
            ? User::where('role', 'admin')->first()->id
            : $report->user_id;

        $message = Chatify::newMessage([
            'from_id' => auth()->id(),
            'to_id' => $receiver_id,
            'body' => $request->message,
            'report_facility_id' => $report->id,
        ]);

        return response()->json($message);
    }

    public function fetch(Request $request)
    {
        $report = ReportFacilities::findOrFail($request->report_id);

        if (
            auth()->user()->role !== 'admin' &&
            auth()->id() !== $report->user_id
        ) {
            abort(403);
        }

        return Chatify::fetchMessagesQuery($request->user_id)
            ->where('report_facility_id', $report->id)
            ->get();
    }
}
