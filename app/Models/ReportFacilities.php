<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportFacilities extends Model
{
    use HasFactory;

    protected $table = 'report_facilities';

    protected $fillable = [
        'nama_fasilitas',
        'deskripsi',
        'lokasi',
        'category_report_id',
        'user_id',
        'tanggal_laporan',
        'bukti',
        'status',
        'is_read_admin'
    ];

    protected $casts = [
        'bukti' => 'array',
        'tanggal_laporan' => 'datetime',
        'is_read_admin' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoryReport()
    {
        return $this->belongsTo(CategoryReports::class, 'category_report_id');
    }

    public function solveReport()
    {
        return $this->hasOne(SolveReports::class, 'report_facility_id');
    }
}
