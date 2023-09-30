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
            $table->float('expenses')->nullable();
            $table->float('km')->nullable();
            $table->float('hours');
            $table->timestamps();
            $table->foreignId('activity_id')->constrained('activities');
            $table->boolean('approved')->default(0);
            $table->boolean('paid')->default(false);
            $table->boolean('is_public_holiday')->default(false);

            $table->unsignedBigInteger('clientinvoice_id')->nullable();
            $table->foreign('clientinvoice_id')->references('id')->on('invoices')->onDelete('cascade');

            $table->unsignedBigInteger('workerinvoice_id')->nullable();
            $table->foreign('workerinvoice_id')->references('id')->on('invoices')->onDelete('cascade');
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
