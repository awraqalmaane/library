@extends('admin.layout')

@section('title', 'رسالة')
@section('page-title', 'عرض الرسالة')

@section('page-actions')
    <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-secondary">← العودة</a>
@endsection

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-2">الاسم</dt>
                <dd class="col-sm-10">{{ $message->name }}</dd>

                <dt class="col-sm-2">البريد</dt>
                <dd class="col-sm-10"><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></dd>

                <dt class="col-sm-2">التاريخ</dt>
                <dd class="col-sm-10">{{ $message->created_at->format('Y-m-d H:i') }}</dd>

                <dt class="col-sm-2">الرسالة</dt>
                <dd class="col-sm-10" style="white-space: pre-line;">{{ $message->body }}</dd>
            </dl>
        </div>
        <div class="card-footer bg-white">
            <a href="mailto:{{ $message->email }}" class="btn btn-dark">↩️ الرد عبر البريد</a>
            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="d-inline" onsubmit="return confirm('حذف الرسالة؟')">
                @csrf @method('DELETE')
                <button class="btn btn-outline-danger">حذف</button>
            </form>
        </div>
    </div>
@endsection
