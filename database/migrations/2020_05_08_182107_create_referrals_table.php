<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referrals', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('reflink_id')->unsigned()->index();
            $table->integer('parent_id')->unsigned()->index();
            $table->decimal('total')->default("0.000")->unsigned();
            $table->decimal('today')->default("0.000")->unsigned();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('referrals');
    }
}
