<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = [
        'user_id',
        'address',
        'country',
        'main_balance',
        'deposit_balance',
        'referral_balance',
        'bitcoinaddress',

    ];


    public function User(){

        return $this->belongsTo('App\User');


    }
}
