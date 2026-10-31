@extends('layouts.public')

@section('title', 'الرئيسية - مكتبة أوراق المعاني')

@section('content')

    {{-- قسم الترحيب بخلفية صورة --}}
    <section class="hero-section text-center text-white d-flex align-items-center justify-content-center">
        <div class="hero-overlay"></div>
        <div class="hero-content px-3">
            <h2 class="display-4 fw-bold" style="font-family: 'Amiri', serif;">
                مرحبًا بكم في مكتبة أوراق المعاني
            </h2>
            <p class="mt-3 fs-4">
                عالم من الشعر والقصائد والمعاني
            </p>

            <div class="mt-4">
                <a href="{{ route('poems') }}" class="btn btn-light btn-lg fw-bold">تصفح القصائد</a>
                <a href="{{ route('diwan') }}" class="btn btn-outline-light btn-lg">الدواوين</a>
                <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg">عن المكتبة</a>
            </div>
        </div>
    </section>

    @push('styles')
    <style>
        .hero-section {
            position: relative;
            /* تمديد القسم لعرض الشاشة كاملاً رغم وجوده داخل container */
            width: 100vw;
            margin-right: calc(50% - 50vw);
            margin-left: calc(50% - 50vw);
            margin-top: -3rem; /* يلغي مسافة الـ my-5 العلوية */
            min-height: 70vh;
            background-image: url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(rgba(20, 24, 31, .65), rgba(20, 24, 31, .8));
        }
        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
        }
    </style>
    @endpush

    {{-- قسم القصائد --}}
    <section class="py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0" style="font-family: 'Amiri', serif;">قصائد</h3>
            <a href="{{ route('poems') }}" class="btn btn-sm btn-outline-dark">عرض الكل ←</a>
        </div>

        <div class="row g-4">
            @forelse ($latestPapers as $paper)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title" style="font-family: 'Amiri', serif;">{{ $paper->title }}</h5>
                            @if($paper->category)
                                <span class="badge bg-secondary align-self-start mb-2">{{ $paper->category->name }}</span>
                            @endif
                            <p class="card-text text-muted poem-excerpt flex-grow-1" style="white-space: pre-line;">{{ $paper->content }}</p>
                            <a href="{{ route('poems.show', $paper) }}" class="btn btn-sm btn-dark mt-2">قراءة القصيدة</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">لا توجد قصائد بعد.</p>
            @endforelse
        </div>
    </section>

@endsection
