<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountSkin extends Model
{
    public function skins()
    {
        return $this->belongsToMany(Skin::class, 'account_skins');
    }
}
