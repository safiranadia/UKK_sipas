<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReportFacilities;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ListReportController extends Controller
{
    public function index()
    {
        $reports = ReportFacilities::with(['user', 'categoryReport', 'solveReport.user'])
            ->where('user_id', Auth::id())
            ->where('status', '!=', 'resolved')
            ->latest()
            ->get();
        $adminId = User::where('role', 'admin')->value('id');
        return view('user.pages.list-report', compact('reports', 'adminId'));
    }
}
