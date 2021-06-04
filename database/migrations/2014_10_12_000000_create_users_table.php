<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->index();
            $table->string('usertype')->nullable();
            $table->string('address');
            $table->string('country');
            $table->decimal('main_balance')->default("0.000")->unsigned();
            $table->decimal('deposit_balance')->default("0.000")->unsigned();
            $table->decimal('referral_balance')->default("0.000")->unsigned();
            $table->string('bitcoinaddress');
            $table->integer('membership_id')->unsigned()->nullable();
            $table->date('membership_started')->nullable();
            $table->date('membership_expired')->nullable();
            $table->tinyinteger('ban')->default('0');
            $table->dateTime('bonus')->nullable();
            $table->tinyInteger('d_code')->nullable();
            $table->string('note')->nullable();
            $table->string('token')->nullable();
            $table->tinyInteger('active')->default('0');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
