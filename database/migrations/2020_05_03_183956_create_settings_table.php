<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name');
            $table->string('site_title');
            $table->string('company_name');
            $table->string('contact_email');
            $table->string('app_contact');
            $table->string('address');
            $table->string('disqus');
            $table->string('chat_code');
            $table->decimal('minimum_deposit')->unsigned()->default('0.00');
            $table->decimal('minimum_withdraw')->unsigned()->default('0.00');
            $table->decimal('self_transfer')->unsigned()->default('0.00');
            $table->decimal('other_transfer')->unsigned()->default('0.00');
            $table->decimal('referral_signup')->unsigned()->default('0.00');
            $table->decimal('referral_deposit')->unsigned()->default('0.00');
            $table->decimal('signup_bonus')->unsigned()->default('0.00');
            $table->decimal('daily_rewards')->unsigned()->default('0.00');
            $table->tinyInteger('latest_deposit');
            $table->decimal('minimum_transfer')->unsigned()->default('0.00');
            $table->tinyInteger('payment_proof');
            $table->string('referral_invest');
            $table->decimal('referral_advert')->default('0.00');
            $table->decimal('referral_upgrade')->default('0.00');
            $table->tinyInteger('transfer');
            $table->tinyInteger('ptc')->default('0');
            $table->tinyInteger('login')->default('0');
            $table->tinyInteger('buy_traffic')->default('0');
            $table->decimal('link_share')->unsigned()->default('0.00');
            $table->tinyInteger('aff_share')->default('0');
            $table->tinyInteger('invest');
            $table->tinyInteger('live_chat');
            $table->tinyInteger('status')->default('0');
            $table->tinyInteger('summary');
            $table->date('start_date');
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
        Schema::dropIfExists('settings');
    }
}
