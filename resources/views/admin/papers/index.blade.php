@extends('admin.layout')

@section('title', 'الأوراق')
@section('page-title', 'الأوراق')

@section('page-actions')
    <a href="{{ route('admin.papers.create') }}" class="btn btn-dark">+ إضافة ورقة</a>
@endsection

@section('content')
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0 align-middle">
                <thead>
                    <tr>
                        <th>العنوان</th>
                        <th>الكاتب</th>
                        <th>التصنيف</th>
                        <th>النوع</th>
                        <th>الحالة</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($papers as $paper)
                        <tr>
                            <td>{{ $paper->title }}</td>
                            <td>{{ $paper->author ?? '—' }}</td>
                            <td>{{ $paper->category->name ?? '—' }}</td>
                            <td>{{ $paper->meaning_type }}</td>
                            <td>
                                <span class="badge bg-{{ $paper->status === 'verified' ? 'success' : 'secondary' }}">
                                    {{ $paper->status === 'verified' ? 'موثّقة' : 'غير موثّقة' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.papers.edit', $paper) }}" class="btn btn-sm btn-outline-primary">تعديل</a>
                                <form action="{{ route('admin.papers.destroy', $paper) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-muted py-4">لا توجد أوراق بعد.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">{{ $papers->links() }}</div>
@endsection
