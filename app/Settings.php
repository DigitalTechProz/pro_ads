<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    //
    protected $fillable = [
        'site_name', 'site_title', 'company_name', 'contact_email', 'app_contact','address',
         'disqus','chat_code','start_date','minimum_deposit','minimum_withdraw','self_transfer',
         'other_transfer','referral_signup','referral_deposit','latest_deposit','minimum_transfer','payment_proof',
         'referral_invest','transfer','self_transfer','invest','live_chat','link_share','summary','membership_upgrade','referral_advert','referral_upgrade',
         'buy_traffic','login','ptc','daily_rewards',
    ];

}
