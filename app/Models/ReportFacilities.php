<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportFacilities extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_report_id',
        'nama_lokasi',
        'deskripsi',
        'foto',
        'status'
    ];
}
