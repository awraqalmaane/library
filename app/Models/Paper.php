<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $table = 'papers';

    protected $fillable = [
        'title',        // عنوان الورقة / النص
        'author',       // اسم الكاتب أو الشاعر / القائل
        'content',      // محتوى النص / المعنى
        'meaning_type', // نوع المعنى (حكم، اقتباس، شعر، تأمل)
        'status',       // حالة الورقة (verified / unverified)
        'category_id',  // التصنيف التابع له الورقة
    ];

    /**
     * كل ورقة تنتمي لتصنيف معين
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
