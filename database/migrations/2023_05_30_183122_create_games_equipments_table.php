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
        Schema::create('games_equipments', function (Blueprint $table) {
            $table->id();
            $table->string('equipment_id');
            $table->string('name');
            $table->string('category');
            $table->integer('quantity');
            $table->date('date_registered');
            $table->boolean('good_condition')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games_equipments');
    }
};
