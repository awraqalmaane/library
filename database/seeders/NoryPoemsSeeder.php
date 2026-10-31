<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Paper;

class NoryPoemsSeeder extends Seeder
{
    /**
     * يقرأ قصائد نوري من ملف JSON ويسجّلها كـ Papers
     * مقسّمة حسب الكاتيجوري (اسم الفولدر).
     */
    public function run(): void
    {
        $path = database_path('data/poems.json');

        if (! file_exists($path)) {
            $this->command->error("لم يتم العثور على الملف: {$path}");
            return;
        }

        $data = json_decode(file_get_contents($path), true);

        if (! is_array($data)) {
            $this->command->error('ملف JSON غير صالح.');
            return;
        }

        // خريطة أسماء الفولدرات العربية -> slug إنجليزي
        $slugMap = [
            'دينيه'  => 'religious',
            'مترجمه' => 'translated',
            'متنوعه' => 'misc',
        ];

        $totalPapers = 0;

        foreach ($data as $categoryName => $poems) {
            $slug = $slugMap[$categoryName] ?? Str::slug($categoryName) ?: Str::random(8);

            $category = Category::updateOrCreate(
                ['slug' => $slug],
                ['name' => $categoryName, 'description' => "قصائد {$categoryName}"]
            );

            foreach ($poems as $poem) {
                $title   = trim($poem['title'] ?? '');
                $content = trim($poem['content'] ?? '');

                if ($content === '') {
                    continue;
                }

                if ($title === '') {
                    $title = Str::limit($content, 50, '');
                }

                Paper::updateOrCreate(
                    [
                        'title'       => $title,
                        'category_id' => $category->id,
                    ],
                    [
                        'author'       => 'نوري علام',
                        'content'      => $content,
                        'meaning_type' => 'قصيدة',
                        'status'       => 'verified',
                    ]
                );

                $totalPapers++;
            }

            $this->command->info("التصنيف «{$categoryName}»: " . count($poems) . " قصيدة");
        }

        $this->command->info("تم تسجيل {$totalPapers} قصيدة في المجموع ✅");
    }
}
