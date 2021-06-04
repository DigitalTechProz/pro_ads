<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offline extends Model
{
    //
    protected $fillable = [

        'name', 'account','fixed','percent','val1','val2','status','details',
        'withdraw_fixed','withdraw_percent','mini_deposit','mini_withdraw',

    ];


}
