<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

use App\Models\Paper;

// أمر لعرض ورقة عشوائية في السطر البرمجي
Artisan::command('paper:quote', function () {
    $paper = Paper::inRandomOrder()->first();

    if ($paper) {
        $this->info("📖 ورقة اليوم: \"{$paper->title}\"");
        $this->comment("— {$paper->author}");
        $this->line($paper->content);
    } else {
        $this->error("لا توجد أوراق معاني في قاعدة البيانات حالياً.");
    }
})->purpose('عرض ورقة معاني عشوائية');