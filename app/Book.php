<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';

    function category()
    {
        return $this->belongsTo('App\Category','id_category');
    }
    function publisher()
    {
        return $this->belongsTo('App\Publisher','id_publisher');
    }
}
