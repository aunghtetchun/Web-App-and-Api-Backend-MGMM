<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    public function getPost()
    {
        return $this->belongsTo('App\Post',"post_id");
    }
}
