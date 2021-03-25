<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opinions extends Model
{
    protected $table = 'opinions';

    protected $fillable = [
        'headline', 'description', 'plague_id', 'num_likes'
    ];
}
