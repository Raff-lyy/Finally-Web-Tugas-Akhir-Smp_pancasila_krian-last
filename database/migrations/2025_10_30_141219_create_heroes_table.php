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
            $table->text('description');
            $table->string('button_1_text')->nullable();
            $table->string('button_1_link')->nullable();
            $table->string('button_2_text')->nullable();
            $table->string('button_2_link')->nullable();
            $table->integer('students')->default(0);
            $table->integer('teachers')->default(0);
            $table->integer('programs')->default(0);
            $table->integer('experience')->default(0);
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

