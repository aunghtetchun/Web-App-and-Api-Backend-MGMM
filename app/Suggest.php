<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suggest extends Model
{
    use SoftDeletes;

    public function getPost()
    {
        return $this->belongsTo('App\Post',"post_id");
    }
    public function getSoftware()
    {
        return $this->belongsTo('App\Software',"software_id");
    }
   public function getAdult(){
	return $this->belongsTo('App\Adult',"adult_id");	
}
}
