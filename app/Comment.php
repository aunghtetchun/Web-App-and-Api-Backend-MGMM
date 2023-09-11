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
	public function getUser()
{
	return $this->belongsTo('App\User',"user_id");
}
 protected $fillable = ['post_id','username' ,'comment', 'user_id'];
}
