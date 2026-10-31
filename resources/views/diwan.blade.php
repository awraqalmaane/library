@extends('layouts.public')

@section('title', 'الدواوين - أوراق المعاني')

@section('content')

    <section class="py-4">
        <h2 class="fw-bold mb-4" style="font-family: 'Amiri', serif;">الدواوين</h2>

        <div class="row g-4">
            @forelse ($diwans as $diwan)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        @if($diwan->cover_image)
                            <img src="{{ $diwan->cover_image }}" class="card-img-top" alt="{{ $diwan->title }}" style="height:200px;object-fit:cover;">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $diwan->title }}</h5>
                            @if($diwan->poet)
                                <h6 class="text-muted">{{ $diwan->poet }}</h6>
                            @endif
                            <p class="card-text text-muted flex-grow-1">{{ Str::limit($diwan->description, 80) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold">{{ number_format($diwan->price, 2) }} جنيه مصري</span>
                                <a href="{{ route('diwan.details', $diwan) }}" class="btn btn-sm btn-dark">عرض التفاصيل</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">لا توجد دواوين متاحة حاليًا.</p>
            @endforelse
        </div>
    </section>

@endsection
