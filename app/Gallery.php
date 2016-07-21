<?php

namespace App;

use App\News;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
	protected $table ="gallery";
    public function news ()
    {
    	return $this->belongsTo(News::class);
	}
}