@extends('admin.layout')

@section('title', 'إضافة ورقة')
@section('page-title', 'إضافة ورقة جديدة')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.papers.store') }}" method="POST">
                @csrf
                @include('admin.papers._form', ['paper' => null])
                <button type="submit" class="btn btn-dark">حفظ</button>
                <a href="{{ route('admin.papers.index') }}" class="btn btn-outline-secondary">إلغاء</a>
            </form>
        </div>
    </div>
@endsection
