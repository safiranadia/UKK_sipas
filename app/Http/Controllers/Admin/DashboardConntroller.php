<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReportFacilities;

class DashboardConntroller extends Controller
{
    public function index()
    {
        $totalReports = ReportFacilities::count();
        $totalNewReport = ReportFacilities::where('status', 'pending')->count();
        $totalProcessReport = ReportFacilities::where('status', 'in_progress')->count();
        $totalDoneReport = ReportFacilities::where('status', 'resolved')->count();

        $newReport = ReportFacilities::with('user')->latest()->limit(3)->get();

        // Data untuk Chart (7 hari terakhir dalam bahasa Indonesia)
        $days = collect();
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            // translatedFormat('l') menghasilkan Senin, Selasa, dst.
            $days->put($date->translatedFormat('l'), ReportFacilities::whereDate('created_at', $date->toDateString())->count());
        }
        $chartLabels = $days->keys()->toArray();
        $chartData = $days->values()->toArray();

        return view('admin.pages.dashboard', compact(
            'totalReports',
            'totalNewReport',
            'totalProcessReport',
            'totalDoneReport',
            'newReport',
            'chartLabels',
            'chartData'
        ));
    }

    public function markAsRead($id)
    {
        $report = ReportFacilities::findOrFail($id);
        $report->update(['is_read_admin' => true]);

        return redirect()->back()->with('success', 'Laporan telah dibaca.');
    }
}
