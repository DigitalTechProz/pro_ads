<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interests', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('invest_id')->unsigned()->unique();
            $table->integer('user_id')->unsigned()->index();
            $table->dateTime('made_time')->nullable();
            $table->string('reference_id');
            $table->dateTime('start_time');
            $table->tinyInteger('status')->default('0');
            $table->integer('total_repeat')->unsigned();
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
        Schema::dropIfExists('interests');
    }
}
