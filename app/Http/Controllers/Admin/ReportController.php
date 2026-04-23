<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryReports;
use App\Models\ReportFacilities;
use App\Models\SolveReports;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status;
        $filter_date = $request->filter_date;
        $category_id = $request->category_id;
        
        $categories = CategoryReports::all();
        
        $reports = ReportFacilities::with(['user', 'categoryReport', 'solveReport'])
            ->when($status, function ($query) use ($status) {
                return $query->where('status', $status);
            })
            ->when($filter_date, function ($query) use ($filter_date) {
                return $query->whereDate('created_at', '=', $filter_date);
            })
            ->when($category_id, function ($query) use ($category_id) {
                return $query->where('category_report_id', $category_id);
            })
            ->latest()
            ->get();

        return view('admin.pages.report', compact('reports', 'status', 'filter_date', 'category_id', 'categories'));
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