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
        Schema::create('teaching_accessories', function (Blueprint $table) {
            $table->id();
            $table->string('accessory_id');
            $table->string('name');
            $table->string('quantity');
            $table->string('unit_of_measure');
            $table->date('date_registered');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teaching_accessories');
    }
};
