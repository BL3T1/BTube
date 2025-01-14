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
        Schema::create('comments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('video_id');
            $table->unsignedInteger('parent_id')->nullable();
            $table->text('content');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('video_id')->references('id')->on('videos')->cascadeOnDelete();
            $table->foreign('parent_id')->references('id')->on('comments')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
