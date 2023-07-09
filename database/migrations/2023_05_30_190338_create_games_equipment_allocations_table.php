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
        Schema::create('games_equipment_allocations', function (Blueprint $table) {
            $table->id();
            $table->string('assignment_id');
            $table->string('equipment_id');
            $table->string('name');
            $table->string('department');
            $table->string('adm');
            $table->string('student_name');
            $table->date('date_given');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games_equipment_allocations');
    }
};
