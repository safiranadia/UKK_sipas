<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolveReports extends Model
{
    use HasFactory;

    protected $table = 'solve_reports';

    protected $fillable = [
        'tanggapan',
        'bukti',
        'tanggal_tanggapan',
        'report_facility_id',
        'user_id'
    ];

    protected $casts = [
        'bukti' => 'array',
        'tanggal_tanggapan' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reportFacility()
    {
        return $this->belongsTo(ReportFacilities::class, 'report_facility_id');
    }
}
