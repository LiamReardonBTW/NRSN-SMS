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
            $table->string('type'); // 'client' or other types
            $table->unsignedBigInteger('recipient_id'); // Foreign key to link to clients or other recipients
            $table->date('date'); // Date of the invoice
            $table->decimal('totalamount', 10, 2); // Total amount of the invoice
            $table->string('status')->default('pending'); // Invoice status (e.g., pending, paid, etc.)
            $table->string('pdf_path'); // Path to the PDF file
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('recipient_id')->references('id')->on('clients')->onDelete('cascade');

            // You can add more fields as needed
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }

};
