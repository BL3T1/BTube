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
        Schema::create('details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedInteger('video_id');
            $table->string('language');
            $table->dateTime('upload_date');
            $table->unsignedInteger('views');
            // TODO: search for the best approach to add times together for the next line.
            $table->time('avg_watch_time'); ///
            $table->unsignedInteger('number_of_likes');
            $table->unsignedInteger('number_of_added_to_favorite');
            $table->foreign('video_id')->references('id')->on('videos')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
