<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_category extends Model
{
    public function getCat()
    {
        return $this->belongsTo('App\Category',"category_id");
    }
}
