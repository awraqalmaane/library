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
        Schema::create('diwans', function (Blueprint $table) {
            $table->id();
            $table->string('title');                    // اسم الديوان
            $table->string('poet')->nullable();         // الشاعر
            $table->text('description')->nullable();    // وصف الديوان
            $table->string('cover_image')->nullable();  // صورة الغلاف (رابط)
            $table->decimal('price', 8, 2)->default(0); // السعر
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diwans');
    }
};
