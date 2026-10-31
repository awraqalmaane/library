<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'أوراق المعاني - منصة الأدب والخواطر')</title>

    <!-- Bootstrap 5 RTL -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">

    <!-- خطوط عربية -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #fdfbf7;
            color: #2c3e50;
        }
        .navbar-brand {
            font-family: 'Amiri', serif;
            font-size: 1.8rem;
        }
        .main-content {
            min-height: 80vh;
        }
        footer {
            background-color: #2c3e50;
            color: #ecf0f1;
            font-family: 'Amiri', serif;
        }
        /* اقتصاص نص القصيدة في الكارت إلى عدد محدد من الأسطر */
        .poem-excerpt {
            display: -webkit-box;
            -webkit-line-clamp: 5;
            line-clamp: 5;
            -webkit-box-orient: vertical;
            overflow: hidden;
            max-height: 9rem;
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- الشريط العلوي -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">📖 أوراق المعاني</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">الرئيسية</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">عن المكتبة</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('diwan') }}">الدواوين</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('poems') }}">قصائد</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('inspiring.video') }}">شخصية ملهمة</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('ai.music') }}">ألحان بالذكاء الاصطناعي</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">تواصل معنا</a></li>
                </ul>
                <div class="d-flex gap-2">
                    <a href="{{ route('cart') }}" class="btn btn-outline-light btn-sm fw-bold">🛒 العربة</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-warning btn-sm fw-bold">لوحة التحكم</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm fw-bold">تسجيل الدخول</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- محتوى الصفحة -->
    <main class="container my-5 main-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- التذييل -->
    <footer class="text-center py-4 mt-5">
        <div class="container">
            <p class="mb-0 fs-5">"الكلمات أوراق تُزهر في عقول من يفهمها"</p>
            <small class="text-muted">جميع الحقوق محفوظة © مشروع أوراق المعاني</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
