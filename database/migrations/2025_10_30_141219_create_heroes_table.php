<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->string('button_1_text')->nullable();
            $table->string('button_1_url')->nullable();
            $table->string('button_2_text')->nullable();
            $table->string('button_2_url')->nullable();
            $table->string('background_image')->nullable();
            $table->json('stats')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};

