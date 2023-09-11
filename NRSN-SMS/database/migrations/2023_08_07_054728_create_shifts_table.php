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
            $table->string('invoice')->nullable();
            $table->string('notes')->nullable();
            $table->foreignId('submitted_by')->constrained('users'); // Foreign key to users table
            $table->foreignId('client_supported')->constrained('clients'); // Foreign key to clients table
            $table->boolean('isflagged')->default(0);
            $table->boolean('isinvoiced')->default(0);
            $table->date('date');
            $table->integer('expenses');
            $table->integer('km');
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
