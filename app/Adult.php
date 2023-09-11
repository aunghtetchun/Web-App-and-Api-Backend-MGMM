<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adult extends Model
{
    public function getPhoto()
    {
        return $this->hasMany('App\Aphoto',"adult_id");
    }
}
