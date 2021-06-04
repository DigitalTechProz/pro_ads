<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_logs', function (Blueprint $table) {
            $table->integer('id');
            $table->string('reference');
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->string('email');
            $table->decimal('amount')->unsigned();
            $table->decimal('charge')->unsigned();
            $table->decimal('net_amount')->unsigned();
            $table->tinyInteger('status')->default("0");
            $table->tinyInteger('type')->unsigned();
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
        Schema::dropIfExists('transfer_logs');
    }
}
