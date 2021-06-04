<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGatewaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gateways', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('account');
            $table->tinyInteger('mode')->default('1');
            $table->decimal('withdraw_fixed')->unsigned()->default("0.00");
            $table->decimal('withdraw_percent')->unsigned()->default("0.00");
            $table->decimal('fixed')->unsigned()->default("0.00");
            $table->decimal('percent')->unsigned()->default("0.00");
            $table->decimal('min_deposit')->unsigned()->default("0.00");
            $table->decimal('min_withdraw')->unsigned()->default("0.00");
            $table->string('val1')->nullable();
            $table->string('val2')->nullable();
            $table->string('val3')->nullable();
            $table->text('details')->nullable();
            $table->tinyInteger('status')->default("1");
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
        Schema::dropIfExists('gateways');
    }
}
