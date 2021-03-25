<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plagues extends Model
{
    protected $table = 'plagues';

    protected $fillable = [
        'name', 'img',
    ];
}
