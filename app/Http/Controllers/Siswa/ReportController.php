<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReportFacilities;
use Illuminate\Support\Facades\Auth;
use App\Models\CategoryReports;

class ReportController extends Controller
{
    public function index()
    {
        $reports = ReportFacilities::where('user_id', Auth::id())->latest()->get();
        return view('user.pages.home', compact('reports'));
    }

    // Simpan laporan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'category_report_id' => 'required|exists:category_reports,id',
            'bukti.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $bukti = [];
        if ($request->hasFile('bukti')) {
            foreach ($request->file('bukti') as $file) {
                $bukti[] = $file->store('bukti', 'public');
            }
        }

        $report = ReportFacilities::create([
            'nama_fasilitas' => $validated['nama_fasilitas'],
            'deskripsi' => $validated['deskripsi'],
            'lokasi' => $validated['lokasi'],
            'category_report_id' => $validated['category_report_id'],
            'user_id' => Auth::id(),
            'bukti' => !empty($bukti) ? json_encode($bukti) : null,
            'tanggal_laporan' => now(),
            'status' => 'pending'
        ]);

        return redirect()->route('siswa.reports.show', $report)
            ->with('success', 'Laporan berhasil dibuat!');
    }
}
