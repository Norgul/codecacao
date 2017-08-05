<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uri extends Model
{
    protected $fillable = [
        'uri',
        'sum_ratings',
        'sum_users'
    ];

    protected $attributes = array(
        'sum_ratings' => 0,
        'sum_users'   => 0
    );
}
