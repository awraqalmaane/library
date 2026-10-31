@extends('admin.layout')

@section('title', 'الدواوين')
@section('page-title', 'الدواوين')

@section('page-actions')
    <a href="{{ route('admin.diwans.create') }}" class="btn btn-dark">+ إضافة ديوان</a>
@endsection

@section('content')
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0 align-middle">
                <thead>
                    <tr>
                        <th>الغلاف</th>
                        <th>العنوان</th>
                        <th>الشاعر</th>
                        <th>السعر (جنيه مصري)</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($diwans as $diwan)
                        <tr>
                            <td style="width:70px">
                                @if($diwan->cover_image)
                                    <img src="{{ $diwan->cover_image }}" alt="" width="50" class="rounded">
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                            <td>{{ $diwan->title }}</td>
                            <td>{{ $diwan->poet ?? '—' }}</td>
                            <td>{{ number_format($diwan->price, 2) }}</td>
                            <td>
                                <a href="{{ route('admin.diwans.edit', $diwan) }}" class="btn btn-sm btn-outline-primary">تعديل</a>
                                <form action="{{ route('admin.diwans.destroy', $diwan) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted py-4">لا توجد دواوين بعد.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">{{ $diwans->links() }}</div>
@endsection
