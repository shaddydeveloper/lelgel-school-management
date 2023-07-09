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
        Schema::create('auto_generate_food_spends', function (Blueprint $table) {
            $table->id();
            $table->string('generate_id');
            $table->string('food_id');
            $table->string('food_name');
            $table->string('quantity');
            $table->date('last_updated');
            $table->boolean('is_upto_date')->nullable();
            $table->boolean('update_daily')->default(true);
            $table->integer('number_of_days_for_update')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auto_generate_food_spends');
    }
};