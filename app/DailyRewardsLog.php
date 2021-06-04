<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyRewardsLog extends Model
{
    //
    protected $fillable = [
        'user_id', 'bonus'
    ];



    public function user(){

        return $this->belongsTo('App\User');


    }
}
