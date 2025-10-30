<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jurnals', function (Blueprint $table) {
            $table->string('judul')->after('id');
            $table->longText('isi')->after('judul');
            $table->string('penulis')->nullable()->after('isi');
            $table->date('tanggal')->nullable()->after('penulis');
        });
    }

    public function down(): void
    {
        Schema::table('jurnals', function (Blueprint $table) {
            $table->dropColumn(['judul', 'isi', 'penulis', 'tanggal']);
        });
    }
};
