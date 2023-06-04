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
        Schema::create('book_hashtag', function (Blueprint $table) {
            $table->foreignId('book_id')->constrained();
            $table->foreignId('hashtag_id')->constrained();
            $table->unique(['book_id', 'hashtag_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_hashtag');
    }
};
