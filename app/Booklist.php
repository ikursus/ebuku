<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booklist extends Model
{
    protected $table = 'booklist';


    public function tempahan()
    {
        return $this->hasMany(Tempahan::class);
    }

}
