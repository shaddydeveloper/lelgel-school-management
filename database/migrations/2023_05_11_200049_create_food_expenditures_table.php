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
        Schema::create('food_expenditures', function (Blueprint $table) {
            $table->id();
            $table->string('expenditure_id');
            $table->string('name');
            $table->double('quantity');
            $table->string('unit_of_measure');
            $table->date('date_taken');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_expenditures');
    }
};
