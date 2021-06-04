<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePtcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptcs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('details');
            $table->string('ad_link');
            $table->integer('membership_id')->unsigned()->index();
            $table->tinyInteger('status')->default('1');
            $table->decimal('rewards')->unsigned();
            $table->tinyInteger('duration')->unsigned();
            $table->tinyInteger('user_id')->unsigned()->foreign();
            $table->tinyInteger('hit')->unsigned();
            $table->tinyInteger('count')->unsigned()->default('0');
            $table->tinyInteger('order_id')->nullable();
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
        Schema::dropIfExists('ptcs');
    }
}
