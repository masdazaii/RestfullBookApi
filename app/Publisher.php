<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $table='publisher';

   

    function publisher()
    {
        return $this->hasMany('App\Book','id_publisher');
    }
}
