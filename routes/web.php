<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PaperController as AdminPaperController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DiwanController as AdminDiwanController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;
use App\Models\Diwan;
use App\Models\Message;
use App\Models\Paper;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| الصفحات العامة - مكتبة أوراق المعاني
|--------------------------------------------------------------------------
*/

// الصفحة الرئيسية
Route::get('/', function () {
    $latestPapers = Paper::with('category')->latest()->take(6)->get();
    return view('home', compact('latestPapers'));
})->name('home');

// عن المكتبة
Route::get('/about', fn () => view('about'))->name('about');

// القصائد (مقسّمة حسب التصنيف)
Route::get('/poems', function () {
    $categories = Category::with(['papers' => fn ($q) => $q->latest()])
        ->whereHas('papers')
        ->get();
    return view('poems', compact('categories'));
})->name('poems');

// تفاصيل القصيدة
Route::get('/poems/{paper}', function (Paper $paper) {
    $paper->load('category');
    return view('poem-details', compact('paper'));
})->name('poems.show');

// الدواوين (بيانات حقيقية من قاعدة البيانات)
Route::get('/diwan', function () {
    $diwans = Diwan::latest()->get();
    return view('diwan', compact('diwans'));
})->name('diwan');

// تفاصيل الديوان
Route::get('/diwan/{diwan}', function (Diwan $diwan) {
    return view('diwan-details', compact('diwan'));
})->name('diwan.details');

// فيديو شخصية ملهمة
Route::get('/inspiring-video', fn () => view('inspiring-video'))->name('inspiring.video');

// ألحان بالذكاء الاصطناعي
Route::get('/ai-music', fn () => view('ai-music'))->name('ai.music');

// تواصل معنا
Route::get('/contact', fn () => view('contact'))->name('contact');

// حفظ رسالة التواصل في قاعدة البيانات
Route::post('/contact', function (\Illuminate\Http\Request $request) {
    $data = $request->validate([
        'name'    => 'required|string|max:255',
        'email'   => 'required|email|max:255',
        'message' => 'required|string',
    ]);

    Message::create([
        'name'  => $data['name'],
        'email' => $data['email'],
        'body'  => $data['message'],
    ]);

    return redirect()->route('contact')->with('success', 'تم إرسال رسالتك بنجاح ✅');
})->name('contact.send');

// العربة
Route::get('/cart', fn () => view('cart'))->name('cart');
Route::post('/cart/add', fn () => redirect()->route('cart')->with('success', 'تمت إضافة الكتاب إلى العربة'))->name('cart.add');
Route::post('/cart/remove', fn () => redirect()->route('cart')->with('success', 'تم حذف الكتاب من العربة'))->name('cart.remove');
Route::post('/checkout', fn () => redirect()->route('home')->with('success', 'تم استلام طلبك بنجاح'))->name('checkout');

/*
|--------------------------------------------------------------------------
| لوحة التحكم (محمية بتسجيل الدخول)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])
    ->prefix('dashboard')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('papers', AdminPaperController::class)->except('show');
        Route::resource('categories', AdminCategoryController::class)->except('show');
        Route::resource('diwans', AdminDiwanController::class)->except('show');

        Route::get('messages', [AdminMessageController::class, 'index'])->name('messages.index');
        Route::get('messages/{message}', [AdminMessageController::class, 'show'])->name('messages.show');
        Route::delete('messages/{message}', [AdminMessageController::class, 'destroy'])->name('messages.destroy');
    });

// توافق مع Breeze: الاسم "dashboard" يشير إلى لوحة الإدارة
Route::get('/home', fn () => redirect()->route('admin.dashboard'))
    ->middleware(['auth'])
    ->name('dashboard');

// الملف الشخصي (من Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
