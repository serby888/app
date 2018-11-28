<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    public $timestamps = false;

    public function states () {
        return $this->hasMany(State::Class);
    }
}
