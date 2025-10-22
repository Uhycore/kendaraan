<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id(); // Primary key
            

            $table->string('nama');              // Nama pemohon/pengemudi
            $table->string('tujuan');            // Tujuan perjalanan
            $table->string('nopol', 20);         // Nomor polisi kendaraan
            $table->date('tanggal');             // Tanggal perjalanan

            // Kolom status (cuma dua pilihan)
            $table->enum('status', ['berangkat', 'kembali'])->default('berangkat');

            // Relasi ke tabel users dan cars
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('car_id')->constrained('cars')->onDelete('cascade');

            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
