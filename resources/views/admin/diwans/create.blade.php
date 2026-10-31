@extends('admin.layout')

@section('title', 'إضافة ديوان')
@section('page-title', 'إضافة ديوان جديد')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.diwans.store') }}" method="POST">
                @csrf
                @include('admin.diwans._form', ['diwan' => null])
                <button type="submit" class="btn btn-dark">حفظ</button>
                <a href="{{ route('admin.diwans.index') }}" class="btn btn-outline-secondary">إلغاء</a>
            </form>
        </div>
    </div>
@endsection
