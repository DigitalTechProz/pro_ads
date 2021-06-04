<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCryptosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cryptos', function (Blueprint $table) {
            $table->integer('id');
            $table->string('transaction_id');
            $table->string('currency1');
            $table->string('currency2');
            $table->integer('user_id')->unsigned();
            $table->integer('gateway_id')->unsigned();
            $table->decimal('amount')->unsigned();
            $table->decimal('amount2')->unsigned();
            $table->decimal('charge')->unsigned();
            $table->decimal('net_amount')->unsigned();
            $table->string('details');
            $table->integer('status')->default("0");
            $table->tinyInteger('payment')->default("0");
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
        Schema::dropIfExists('cryptos');
    }
}
