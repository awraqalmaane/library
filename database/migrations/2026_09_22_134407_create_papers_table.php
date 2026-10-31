<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('papers', function (Blueprint $table) {
            $table->id();
            $table->string('title');                    // عنوان الورقة / النص
            $table->string('author')->nullable();       // اسم الكاتب أو الشاعر
            $table->text('content');                    // محتوى النص / المعنى
            $table->string('meaning_type', 100);        // نوع المعنى (حكم، اقتباس، شعر...)
            $table->string('status')->default('unverified'); // حالة الورقة
            $table->foreignId('category_id')            // التصنيف التابع له الورقة
                  ->constrained('categories')
                  ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('papers');
    }
};
