@extends('layouts.public')

@section('title', 'شخصية ملهمة - أوراق المعاني')

@section('content')

    <section class="py-4 text-center">
        <h2 class="fw-bold mb-4" style="font-family: 'Amiri', serif;">فيديو شخصية ملهمة</h2>
        <p class="fs-5 text-muted mb-4">قصة مُلهمة تستحق أن تُشاهد وتُتأمّل.</p>

        <div class="ratio ratio-16x9 mx-auto shadow rounded overflow-hidden" style="max-width: 800px;">
            <iframe
                src="https://www.youtube.com/embed/7l7ui9GM1Eo"
                title="فيديو شخصية ملهمة"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen>
            </iframe>
        </div>
    </section>

@endsection
