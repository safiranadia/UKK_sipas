<?php

namespace App\Http\Controllers;

use App\Models\ReportComment;
use App\Models\ReportFacilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportCommentController extends Controller
{
    /**
     * Display a listing of comments for a specific report.
     */
    public function index($report_id)
    {
        $report = ReportFacilities::findOrFail($report_id);

        // Security: Only the report owner and admin can view comments
        if (Auth::user()->role != 'admin' && Auth::id() != $report->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $comments = ReportComment::with('user')
            ->where('report_facility_id', $report_id)
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json($comments);
    }

    /**
     * Store a newly created comment in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'report_facility_id' => 'required|exists:report_facilities,id',
            'comment' => 'required|string|max:1000',
        ]);

        $report = ReportFacilities::findOrFail($request->report_facility_id);

        // Security: Only the report owner and admin can comment
        if (Auth::user()->role != 'admin' && Auth::id() != $report->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $comment = ReportComment::create([
            'report_facility_id' => $request->report_facility_id,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
        ]);

        return response()->json($comment->load('user'));
    }
}
