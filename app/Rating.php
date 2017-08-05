<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'visitor_id',
        'uri',
        'rating'
    ];

    public function uri()
    {
        return $this->belongsTo('App\Uri', 'uri', 'uri');
    }
}
