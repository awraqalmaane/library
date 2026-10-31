@extends('admin.layout')

@section('title', 'تعديل ورقة')
@section('page-title', 'تعديل الورقة')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.papers.update', $paper) }}" method="POST">
                @csrf @method('PUT')
                @include('admin.papers._form', ['paper' => $paper])
                <button type="submit" class="btn btn-dark">تحديث</button>
                <a href="{{ route('admin.papers.index') }}" class="btn btn-outline-secondary">إلغاء</a>
            </form>
        </div>
    </div>
@endsection
