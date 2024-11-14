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
        Schema::create('music_list', function (Blueprint $table) {
            $table->id();
            $table->foreignId('creator_id')->nullable()->references("id")->on("users")->nullOnDelete();
            $table->string("title", length: 255);
            $table->timestamps();
        });

        Schema::create('music_list_tracks', function (Blueprint $table) {
            $table->foreignId('music_list_id')->references("id")->on("music_list")->cascadeOnDelete();
            $table->foreignId('music_id')->references("id")->on("music")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('music_list_tracks');
        Schema::dropIfExists('music_list');
    }
};
