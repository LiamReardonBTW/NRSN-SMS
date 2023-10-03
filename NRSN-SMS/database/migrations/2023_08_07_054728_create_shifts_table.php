<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->string('notes')->nullable();
            $table->foreignId('submitted_by')
                ->nullable()
                ->constrained('users')
                ->onDelete('cascade');

            $table->foreignId('client_supported')
                ->nullable()
                ->constrained('clients')
                ->onDelete('cascade');

            $table->boolean('isflagged')->default(0);
            $table->date('date');
            $table->float('expenses')->nullable();
            $table->float('km')->nullable();
            $table->float('hours');
            $table->timestamps();
            $table->unsignedBigInteger('activity_id')->nullable();
            $table->foreign('activity_id')
                 ->references('id')
                 ->on('activities')
                 ->onUpdate('cascade')
                 ->onDelete('set null'); // Set the foreign key to null on delete
            $table->boolean('approved')->default(0);
            $table->boolean('paid')->default(false);
            $table->boolean('is_public_holiday')->default(false);

            $table->unsignedBigInteger('clientinvoice_id')->nullable();
            $table->foreign('clientinvoice_id')
                ->references('id')
                ->on('invoices')
                ->onUpdate('cascade')
                ->onDelete('set null'); // Set the foreign key to null on invoice deletion

            $table->unsignedBigInteger('workerinvoice_id')->nullable();
            $table->foreign('workerinvoice_id')
                ->references('id')
                ->on('invoices')
                ->onUpdate('cascade')
                ->onDelete('set null'); // Set the foreign key to null on invoice deletion
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
