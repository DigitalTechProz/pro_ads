<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    //
    protected $fillable = [
        'transaction_id', 'user_id', 'gateway_name','amount','charge','net_amount','status','details',
    ];

    public function user(){

        return $this->belongsTo('App\User');

    }
}
