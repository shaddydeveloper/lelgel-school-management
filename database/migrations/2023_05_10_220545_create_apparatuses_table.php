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
        Schema::create('apparatuses', function (Blueprint $table) {
            $table->id();
            $table->string('apparator_id');
            $table->string('name');
            $table->integer('quantity');
            $table->string('condition')->default('good condition');
            $table->boolean('available')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apparatuses');
    }
};
