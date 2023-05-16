<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viewer extends Model
{
    public function getPost()
    {
        return $this->belongsTo('App\Post',"post_id");
    }
    protected $fillable = [
        'post_id','count'
    ];
}
