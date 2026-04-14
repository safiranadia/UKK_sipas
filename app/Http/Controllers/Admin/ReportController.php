<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ReportFacilities;
use App\Models\SolveReports;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status;
        $reports = ReportFacilities::with(['user', 'categoryReport', 'solveReport'])
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

        if ($request->status === 'resolved') {
            $validated = $request->validate([
                'tanggapan' => 'required|string',
                'bukti.*' => 'nullable|file|mimes:jpeg,png,jpg|max:5120' // 5MB
            ]);

            $bukti = [];
            if ($request->hasFile('bukti')) {
                foreach ($request->file('bukti') as $file) {
                    $path = $file->store('bukti-solusi/' . $id, 'public');
                    $bukti[] = [
                        'path' => $path,
                        'type' => $file->getMimeType(),
                        'name' => $file->getClientOriginalName()
                    ];
                }
            }

            // Simpan atau update solusi
            SolveReports::updateOrCreate(
                ['report_facility_id' => $id],
                [
                    'tanggapan' => $validated['tanggapan'],
                    'bukti' => !empty($bukti) ? $bukti : null,
                    'tanggal_tanggapan' => now(),
                    'user_id' => Auth::id()
                ]
            );
        }

        $report->status = $request->status;
        $report->save();

        return redirect()->back()->with('success', 'Status laporan berhasil diperbarui.');
    }
}
