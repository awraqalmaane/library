@extends('layouts.public')

@section('title', $diwan->title . ' - أوراق المعاني')

@section('content')

    <section class="py-4">
        <div class="row g-4">
            @if($diwan->cover_image)
                <div class="col-md-4">
                    <img src="{{ $diwan->cover_image }}" class="img-fluid rounded shadow-sm" alt="{{ $diwan->title }}">
                </div>
            @endif

            <div class="col-md-8">
                <h2 class="fw-bold" style="font-family: 'Amiri', serif;">{{ $diwan->title }}</h2>
                @if($diwan->poet)
                    <h5 class="text-muted mb-3">{{ $diwan->poet }}</h5>
                @endif

                <p class="fs-5" style="white-space: pre-line;">{{ $diwan->description }}</p>

                <div class="mt-4">
                    <span class="fs-4 fw-bold">{{ number_format($diwan->price, 2) }} جنيه مصري</span>
                </div>

                <form action="{{ route('cart.add') }}" method="POST" class="mt-3">
                    @csrf
                    <input type="hidden" name="diwan_id" value="{{ $diwan->id }}">
                    <button type="submit" class="btn btn-dark">🛒 إضافة إلى العربة</button>
                    <a href="{{ route('diwan') }}" class="btn btn-outline-dark">العودة إلى الدواوين</a>
                </form>
            </div>
        </div>
    </section>

@endsection
