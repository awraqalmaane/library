@extends('admin.layout')

@section('title', 'الرسائل')
@section('page-title', 'رسائل التواصل')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0 align-middle">
                <thead>
                    <tr>
                        <th>الحالة</th>
                        <th>الاسم</th>
                        <th>البريد</th>
                        <th>التاريخ</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $message)
                        <tr class="{{ $message->is_read ? '' : 'table-warning fw-bold' }}">
                            <td>
                                @if($message->is_read)
                                    <span class="badge bg-secondary">مقروءة</span>
                                @else
                                    <span class="badge bg-warning text-dark">جديدة</span>
                                @endif
                            </td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.messages.show', $message) }}" class="btn btn-sm btn-outline-dark">عرض</a>
                                <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="d-inline" onsubmit="return confirm('حذف الرسالة؟')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted py-4">لا توجد رسائل بعد.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">{{ $messages->links() }}</div>
@endsection
