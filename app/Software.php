<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    public function getPhoto()
    {
        return $this->hasMany('App\Photo',"software_id");
    }

   
    public function getUser()
    {
        return $this->belongsTo('App\User',"user_id");
    }
   
    public function getComment()
    {
        return $this->hasMany('App\Comment',"software_id");
    }
   
    protected $fillable = [
        'id','count','rating','slug'
    ];
}
