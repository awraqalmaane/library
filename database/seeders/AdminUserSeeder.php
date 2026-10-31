<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * ينشئ حساب مدير لوحة التحكم (أو يحدّثه إن كان موجودًا).
     */
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'awraqalmaane@gmail.com'],
            [
                'name' => 'أوراق المعاني',
                'password' => 'Awraq12345678',
                'email_verified_at' => now(),
            ]
        );

        $this->command->info("تم تسجيل المستخدم «{$user->email}» ✅");
    }
}
