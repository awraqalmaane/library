@extends('layouts.public')

@section('title', 'قصائد - أوراق المعاني')

@section('content')

    <section class="py-4">
        <h2 class="fw-bold mb-2" style="font-family: 'Amiri', serif;">قصائد</h2>
        <p class="text-muted mb-5">مجموعة من القصائد مقسّمة حسب التصنيف</p>

        @forelse ($categories as $category)
            <div class="mb-5">
                <h3 class="h4 fw-bold border-bottom pb-2 mb-4" style="font-family: 'Amiri', serif;">
                    {{ $category->name }}
                    <span class="badge bg-secondary align-middle">{{ $category->papers->count() }}</span>
                </h3>

                <div class="row g-4">
                    @foreach ($category->papers as $paper)
                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title" style="font-family: 'Amiri', serif;">{{ $paper->title }}</h5>
                                    @if($paper->author)
                                        <h6 class="text-muted small mb-2">{{ $paper->author }}</h6>
                                    @endif
                                    <p class="card-text text-muted poem-excerpt flex-grow-1" style="white-space: pre-line;">{{ $paper->content }}</p>
                                    <a href="{{ route('poems.show', $paper) }}" class="btn btn-sm btn-dark mt-2">قراءة القصيدة</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <p class="text-muted">لا توجد قصائد متاحة حاليًا.</p>
        @endforelse
    </section>

@endsection
