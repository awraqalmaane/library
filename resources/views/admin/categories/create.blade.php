@extends('admin.layout')

@section('title', 'إضافة تصنيف')
@section('page-title', 'إضافة تصنيف جديد')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                @include('admin.categories._form', ['category' => null])
                <button type="submit" class="btn btn-dark">حفظ</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">إلغاء</a>
            </form>
        </div>
    </div>
@endsection
