<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // 'client' or 'worker'
            $table->date('date'); // Date of the invoice
            $table->decimal('totalamount', 10, 2); // Total amount of the invoice
            $table->string('status')->default('pending'); // Invoice status (e.g., pending, paid, etc.)
            $table->string('pdf_path'); // Path to the PDF file
            $table->timestamps();

            // Add the recipient_type and recipient_id columns for polymorphic relationship
            $table->unsignedBigInteger('recipient_id');
            $table->string('recipient_type');
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }

};
