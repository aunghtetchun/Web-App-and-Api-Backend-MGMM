<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aphoto extends Model
{

public function getAphoto()
{
    return $this->hasMany('App\Aphoto',"adult_id");
}
    //
}
