<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReportFacilities;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HistoryReportController extends Controller
{
    public function index()
    {
        $reports = ReportFacilities::with(['user', 'categoryReport'])
            ->where('user_id', Auth::id())
            ->where('status', 'resolved')
            ->latest()
            ->get();

        return view('user.pages.history', compact('reports'));
    }
}
