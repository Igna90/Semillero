<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rid extends Model
{
    protected $table = 'rids';

    protected $fillable = [
        'product_id', 'plague_id',
    ];
}
