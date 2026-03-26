<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ReportFacilities;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status;
        $reports = ReportFacilities::with(['user', 'categoryReport'])
            ->when($status, function ($query) use ($status) {
                return $query->where('status', $status);
            })
            ->latest()
            ->get(); // Using get() for now as user's previous pages didn't use pagination

        return view('admin.pages.report', compact('reports'));
    }

    public function updateStatus(Request $request, $id)
    {
        $report = ReportFacilities::findOrFail($id);
        $report->status = $request->status;
        $report->save();

        return redirect()->back()->with('success', 'Status laporan berhasil diperbarui.');
    }
}
