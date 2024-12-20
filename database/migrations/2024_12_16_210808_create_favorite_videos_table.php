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
        Schema::create('favorite_videos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedInteger('favorite_id');
            $table->unsignedInteger('video_id');
            $table->foreign('favorite_id')->references('id')->on('favorites')->cascadeOnDelete();
            $table->foreign('video_id')->references('id')->on('videos')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorite_videos');
    }
};
