<?php

namespace App;
use App\News;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
	public $table  ='slider';
    // protected $fillable=['news_id'];
    public function news (){
    	return $this->hasMany(News::class);
    }
}
