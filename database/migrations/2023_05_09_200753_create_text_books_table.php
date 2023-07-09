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
        Schema::create('text_books', function (Blueprint $table) {
            $table->id();
            $table->string('book_id');
            $table->string('title_id');
            $table->string('title');
            $table->string('book_number');
            $table->string('subject');
            $table->string('condition')->default('good condition');
            $table->string('status')->default('available');
            $table->date('date_registered');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('text_books');
    }
};
