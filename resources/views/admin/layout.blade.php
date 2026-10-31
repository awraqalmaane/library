<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'لوحة التحكم') - أوراق المعاني</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Tajawal', sans-serif; background-color: #f4f6f9; }
        .admin-sidebar {
            background-color: #2c3e50;
            min-height: 100vh;
            color: #ecf0f1;
        }
        .admin-sidebar .brand {
            font-family: 'Amiri', serif;
            font-size: 1.5rem;
        }
        .admin-sidebar a {
            color: #ecf0f1;
            text-decoration: none;
            display: block;
            padding: .65rem 1rem;
            border-radius: .5rem;
            margin-bottom: .25rem;
        }
        .admin-sidebar a:hover,
        .admin-sidebar a.active {
            background-color: rgba(255,255,255,.12);
        }
        .stat-card { border: none; border-radius: 1rem; }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- الشريط الجانبي -->
        <aside class="col-md-3 col-lg-2 admin-sidebar p-3">
            <div class="brand text-center mb-4 mt-2">📖 لوحة التحكم</div>
            <nav>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">🏠 الرئيسية</a>
                <a href="{{ route('admin.papers.index') }}" class="{{ request()->routeIs('admin.papers.*') ? 'active' : '' }}">📝 الأوراق</a>
                <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">🗂️ التصنيفات</a>
                <a href="{{ route('admin.diwans.index') }}" class="{{ request()->routeIs('admin.diwans.*') ? 'active' : '' }}">📚 الدواوين</a>
                <a href="{{ route('admin.messages.index') }}" class="{{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">✉️ الرسائل</a>
                <hr>
                <a href="{{ route('home') }}">🌐 عرض الموقع</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link text-white text-decoration-none p-0 px-3 py-2">🚪 تسجيل الخروج</button>
                </form>
            </nav>
        </aside>

        <!-- المحتوى -->
        <main class="col-md-9 col-lg-10 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0" style="font-family: 'Amiri', serif;">@yield('page-title', 'لوحة التحكم')</h1>
                @yield('page-actions')
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
