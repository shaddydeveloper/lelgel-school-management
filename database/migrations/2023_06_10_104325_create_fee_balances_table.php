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
        Schema::create('fee_balances', function (Blueprint $table) {
            $table->id();
            $table->string('adm');
            $table->string('name');
            $table->date('last_payed')->nullable();
            $table->double('amount');
            $table->string('parent_number')->nullable();
            $table->boolean('current_term_updated')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_balances');
    }
};