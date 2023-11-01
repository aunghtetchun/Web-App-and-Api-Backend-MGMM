<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skin extends Model
{
    public function accounts()
    {
        return $this->belongsToMany(Account::class, 'account_skins');
    }
}
