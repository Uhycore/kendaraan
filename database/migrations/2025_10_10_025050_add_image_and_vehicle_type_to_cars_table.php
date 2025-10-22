<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            // Tipe kendaraan
            $table->enum('vehicle_type', ['motor', 'mobil', 'bus'])
                ->default('mobil')
                ->after('fuel_type');

            // Nama file terenkripsi (bukan file binernya)
            $table->string('image', 255)
                ->nullable()
                ->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn(['vehicle_type', 'image']);
        });
    }
};
