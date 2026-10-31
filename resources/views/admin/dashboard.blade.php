@extends('admin.layout')

@section('title', 'الرئيسية')
@section('page-title', 'نظرة عامة')

@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card stat-card shadow-sm text-center p-3">
                <div class="fs-1">📝</div>
                <div class="fs-3 fw-bold">{{ $stats['papers'] }}</div>
                <div class="text-muted">الأوراق</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card shadow-sm text-center p-3">
                <div class="fs-1">🗂️</div>
                <div class="fs-3 fw-bold">{{ $stats['categories'] }}</div>
                <div class="text-muted">التصنيفات</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card shadow-sm text-center p-3">
                <div class="fs-1">📚</div>
                <div class="fs-3 fw-bold">{{ $stats['diwans'] }}</div>
                <div class="text-muted">الدواوين</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card shadow-sm text-center p-3">
                <div class="fs-1">✉️</div>
                <div class="fs-3 fw-bold">{{ $stats['messages'] }}</div>
                <div class="text-muted">الرسائل ({{ $stats['unread'] }} غير مقروءة)</div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-white fw-bold">آخر الرسائل</div>
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>البريد</th>
                        <th>التاريخ</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($latestMessages as $message)
                        <tr class="{{ $message->is_read ? '' : 'fw-bold' }}">
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->created_at->diffForHumans() }}</td>
                            <td><a href="{{ route('admin.messages.show', $message) }}" class="btn btn-sm btn-outline-dark">عرض</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center text-muted py-4">لا توجد رسائل بعد.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
