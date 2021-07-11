<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    function types() {
        return $this->hasMany("App\User");
    }
}
