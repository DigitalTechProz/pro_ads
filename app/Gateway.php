<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gateway extends Model
{
    //
    protected $fillable = [

        'name', 'account','fixed','percent','mode','val1','val2','status','details','val3',
        'withdraw_fixed','withdraw_percent','mini_deposit','mini_withdraw',
    ];

    public function cryptos(){

        return $this->hasMany('App\Crypto');

    }
}
