<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraws', function (Blueprint $table) {
            $table->integer('id');
            $table->string('transaction_id');
            $table->integer('user_id')->unsigned();
            $table->string('gateway_name');
            $table->string('account');
            $table->decimal('amount')->unsigned();
            $table->decimal('charge')->unsigned();
            $table->decimal('net_amount')->unsigned();
            $table->tinyInteger('status')->default("0");
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
        Schema::dropIfExists('withdraws');
    }
}
