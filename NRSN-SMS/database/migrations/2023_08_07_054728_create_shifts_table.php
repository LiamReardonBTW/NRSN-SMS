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
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->string('notes')->nullable();
            $table->string('submitted_by');
            $table->string('client_supported');
            $table->boolean('isflagged')->default(0);
            $table->boolean('isinvoiced')->default(0);
            $table->date('date');
            $table->integer('expenses');
            $table->integer('Km');
            $table->integer('hours');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shifts');
    }
};
