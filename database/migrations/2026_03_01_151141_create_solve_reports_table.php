<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('solve_reports', function (Blueprint $table) {
            $table->id();
            $table->text('tanggapan');
            $table->json('bukti')->nullable();
            $table->dateTime('tanggal_tanggapan');
            $table->foreignId('report_facility_id')->constrained('report_facilities')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solve_reports');
    }
};
