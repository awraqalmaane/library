@extends('layouts.public')

@section('title', 'العربة - أوراق المعاني')

@section('content')

    <section class="py-4">
        <h2 class="fw-bold mb-4" style="font-family: 'Amiri', serif;">🛒 عربة التسوق</h2>
        <p class="fs-5 text-muted">العربة فارغة حاليًا.</p>

        <a href="{{ route('diwan') }}" class="btn btn-dark">تصفح الدواوين</a>
    </section>

@endsection
