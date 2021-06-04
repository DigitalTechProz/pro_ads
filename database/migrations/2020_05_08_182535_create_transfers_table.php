<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->integer('id');
            $table->string('reference');
            $table->integer('user_id')->unsigned();
            $table->integer('receipt')->unsigned();
            $table->decimal('amount')->unsigned();
            $table->decimal('charge')->unsigned();
            $table->decimal('net_amount')->unsigned();
            $table->tinyInteger('verify')->nullable();
            $table->tinyInteger('status')->default("0");
            $table->tinyInteger('counter')->default("1");
            $table->tinyInteger('type')->unsigned()->default("0");
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
        Schema::dropIfExists('transfers');
    }
}
