<?php
// database/migrations/XXXX_XX_XX_XXXXXX_add_role_to_users_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // pakai enum kalau DB-mu mendukung, kalau ragu pakai string
            $table->enum('role', ['admin', 'user', 'supervisor'])->default('user')->after('email');
            // alternatif:
            // $table->string('role', 20)->default('user')->after('email');
        });
    }
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
