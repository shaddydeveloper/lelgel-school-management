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
        Schema::create('assign_text_books', function (Blueprint $table) {
            $table->id();
            $table->string('assigned_id');
            $table->string('book_id');
            $table->string('title_id');
            $table->string('title');
            $table->string('book_number');
            $table->string('subject');
            $table->string('adm');
            $table->string('name');
            $table->boolean('shared');
            $table->boolean('available')->default(true);
            $table->date('date_given');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_text_books');
    }
};
