<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients'); // Assuming 'clients' is the table name for clients
            $table->dateTime('startdate');
            $table->dateTime('enddate')->nullable();
            $table->float('balance');
            $table->float('weekdayhourlyrate');
            $table->float('saturdayhourlyrate');
            $table->float('sundayhourlyrate');
            $table->float('publicholidayhourlyrate');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_contracts');
    }
};
