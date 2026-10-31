@extends('admin.layout')

@section('title', 'تعديل ديوان')
@section('page-title', 'تعديل الديوان')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.diwans.update', $diwan) }}" method="POST">
                @csrf @method('PUT')
                @include('admin.diwans._form', ['diwan' => $diwan])
                <button type="submit" class="btn btn-dark">تحديث</button>
                <a href="{{ route('admin.diwans.index') }}" class="btn btn-outline-secondary">إلغاء</a>
            </form>
        </div>
    </div>
@endsection
