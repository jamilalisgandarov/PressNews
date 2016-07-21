<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public $table  ='subcategories';
	protected $fillable = [
        'title_az', 'title_en', 'title_ru','visibility','category_id'
    ];

    function category()
    {
    	return $this->belongsTo('App\Category');
    }
    function news()
    {
    	return $this->hasMany('App\News');
    }
}
