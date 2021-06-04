<?php

namespace App;

use App\Notifications\VerifyNewaccount;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email', 'password','usertype','address',
        'active',
        'token',
        'ban'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
        'country',
        'main_balance',
        'deposit_balance',
        'referral_balance',
        'bitcoinaddress',
        'membership_id','membership_started','membership_expired','token','d_code','ban','note',


    ];


    public function invests(){

        return $this->hasMany('App\Invest');

    }
    public function interests(){

        return $this->hasMany('App\Interest');

    }
    public function interestlogs(){

        return $this->hasMany('App\InterestLog');

    }
    public function deposits(){

        return $this->hasMany('App\Deposit');


    }
    public function Cryptos(){

        return $this->hasMany('App\Crypto');


    }
    public function reflink(){

        return $this->hasOne('App\Reflink');

    }
    public function testimonial(){

        return $this->hasOne('App\Testimonial');


    }
    public function membership(){

        return $this->belongsTo('App\Membership');


    }
    public function orders(){

        return $this->hasMany('App\Order');


    }
    public function ptcs(){

        return $this->hasMany('App\PTC');

    }
    public function links(){

        return $this->hasMany('App\Link');

    }
    public function shares(){

        return $this->hasMany('App\Share');

    }
    public function adverts(){

        return $this->hasMany('App\PTC');

    }
    public function verified(){

        return $this->active === 1;

    }

    public function sendVerificationEmail(){

        return $this->notify(new VerifyNewaccount($this));

    }

    public function scopeSearch($query, $search){


        return $query->where('email', 'like', '%'.$search.'%')
            ->orWhere('name', 'like', '%'.$search.'%');

    }

}
