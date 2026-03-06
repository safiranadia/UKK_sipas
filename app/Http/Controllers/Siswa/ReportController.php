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
        $categories = CategoryReports::all();
        return view('user.pages.home', compact('reports', 'categories'));
    }

    // Simpan laporan baru
    // app/Http/Controllers/Siswa/ReportController.php
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'category_report_id' => 'required|exists:category_reports,id',
            'tanggal_laporan' => 'required|date',
            'bukti.*' => 'nullable|file|mimes:jpeg,png,jpg,mp4,mov,avi|max:10240' // 10MB
        ]);

        $bukti = [];
        if ($request->hasFile('bukti')) {
            foreach ($request->file('bukti') as $file) {
                $path = $file->store('bukti-laporan/' . Auth::id(), 'public');
                $bukti[] = [
                    'path' => $path,
                    'type' => $file->getMimeType(),
                    'name' => $file->getClientOriginalName()
                ];
            }
        }

        $report = ReportFacilities::create([
            'nama_fasilitas' => $validated['nama_fasilitas'],
            'deskripsi' => $validated['deskripsi'],
            'lokasi' => $validated['lokasi'],
            'category_report_id' => $validated['category_report_id'],
            'user_id' => Auth::id(),
            'tanggal_laporan' => $validated['tanggal_laporan'],
            'bukti' => !empty($bukti) ? json_encode($bukti) : null,
            'status' => 'pending'
        ]);

        return redirect()->route('siswa.reports.show', $report)
            ->with('success', 'Laporan berhasil dibuat!');
    }
}
