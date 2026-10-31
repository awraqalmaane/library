@extends('admin.layout')

@section('title', 'تعديل تصنيف')
@section('page-title', 'تعديل التصنيف')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                @csrf @method('PUT')
                @include('admin.categories._form', ['category' => $category])
                <button type="submit" class="btn btn-dark">تحديث</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">إلغاء</a>
            </form>
        </div>
    </div>
@endsection
