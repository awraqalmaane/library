@extends('layouts.public')

@section('title', $paper->title . ' - أوراق المعاني')

@section('content')

    <section class="py-4">
        <nav class="mb-4">
            <a href="{{ route('poems') }}" class="text-decoration-none">← كل القصائد</a>
        </nav>

        <article class="mx-auto" style="max-width: 720px;">
            <header class="text-center mb-4">
                <h1 class="fw-bold" style="font-family: 'Amiri', serif;">{{ $paper->title }}</h1>
                @if($paper->author)
                    <p class="text-muted mb-1">{{ $paper->author }}</p>
                @endif
                @if($paper->category)
                    <span class="badge bg-dark">{{ $paper->category->name }}</span>
                @endif
            </header>

            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="fs-5 lh-lg text-center" style="font-family: 'Amiri', serif; white-space: pre-line;">{{ $paper->content }}</div>
                </div>
            </div>
        </article>
    </section>

@endsection
