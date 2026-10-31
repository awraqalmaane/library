<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diwan extends Model
{
    protected $fillable = [
        'title',
        'poet',
        'description',
        'cover_image',
        'price',
    ];
}
