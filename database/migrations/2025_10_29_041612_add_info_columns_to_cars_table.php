<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->date('tanggal_pengurusan')->nullable()->after('status');
            $table->date('masa_berlaku_pajak_1_tahun')->nullable()->after('tanggal_pengurusan');
            $table->date('masa_berlaku_pajak_5_tahun')->nullable()->after('masa_berlaku_pajak_1_tahun');
            $table->date('uji_kir')->nullable()->after('masa_berlaku_pajak_5_tahun');
            $table->string('keterangan')->nullable()->after('uji_kir');
        });
    }

    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn([
                'tanggal_pengurusan',
                'masa_berlaku_pajak_1_tahun',
                'masa_berlaku_pajak_5_tahun',
                'uji_kir',
                'keterangan',
            ]);
        });
    }
};
