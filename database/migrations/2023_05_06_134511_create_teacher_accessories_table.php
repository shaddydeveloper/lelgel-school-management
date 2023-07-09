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
        Schema::create('teacher_accessories', function (Blueprint $table) {
            $table->id();
            $table->string('assigned_id');
            $table->string('accessory_id');
            $table->string('accessory_name');
            $table->string('teacher_id');
            $table->string('teacher_name');
            $table->date('date_assigned');
            $table->string('quantity');
            $table->string('assigned_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_accessories');
    }
};
