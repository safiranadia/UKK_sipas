<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use function Laravel\Prompts\table;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('report_facilities', function (Blueprint $table) {
            $table->id();
            $table->string('nama_fasilitas');
            $table->text('deskripsi');
            $table->json('bukti')->nullable();
            $table->string('lokasi');
            $table->enum('status', ['pending', 'approved', 'in_progress', 'resolved'])->default('pending');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('category_report_id')->constrained('category_reports')->onDelete('cascade');
            $table->dateTime('tanggal_laporan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_facilities');
    }
};
