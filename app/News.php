<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $table  ='news';
    function category()
    {
    	return $this->belongsTo('App\Category');
    }
    function subcategory()
    {
    	return $this->belongsTo('App\Subcategory');
    }
    function user()
    {
    	return $this->belongsTo('App\User');
    }
    function gallery()
    {
        return $this->hasMany('App\Gallery');
    }
}
