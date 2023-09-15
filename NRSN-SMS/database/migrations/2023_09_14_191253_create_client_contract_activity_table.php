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
        Schema::create('client_contract_activity', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_contract_id');
            $table->unsignedBigInteger('activity_id');
            $table->timestamps();

            $table->foreign('client_contract_id')->references('id')->on('client_contracts')->onDelete('cascade');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_contract_activity');
    }
};
