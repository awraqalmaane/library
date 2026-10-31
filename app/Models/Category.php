<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',        // اسم التصنيف
        'slug',        // الرابط المختصر
        'description', // وصف التصنيف
    ];

    /**
     * كل تصنيف يحتوي على عدة أوراق معاني
     */
    public function papers()
    {
        return $this->hasMany(Paper::class);
    }
}
