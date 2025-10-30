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
    Schema::create('abouts', function (Blueprint $table) {
        $table->id();
        $table->string('title')->nullable();
        $table->text('subtitle')->nullable();
        $table->text('visi')->nullable();
        $table->json('misi')->nullable();
        $table->json('values')->nullable();
        $table->string('image')->nullable();
        $table->json('stats')->nullable();
        $table->timestamps();
    });
}

};
