<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterestLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interest_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invest_id')->unsigned()->unique();
            $table->string('reference_id');
            $table->decimal('amount')->default('0');
            $table->integer('user_id')->unsigned()->index();
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
        Schema::dropIfExists('interest_logs');
    }
}
