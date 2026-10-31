@php $paper = $paper ?? null; @endphp

<div class="mb-3">
    <label class="form-label">العنوان *</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $paper->title ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">الكاتب / الشاعر</label>
    <input type="text" name="author" class="form-control" value="{{ old('author', $paper->author ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">المحتوى *</label>
    <textarea name="content" rows="5" class="form-control" required>{{ old('content', $paper->content ?? '') }}</textarea>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label">نوع المعنى *</label>
        <input type="text" name="meaning_type" class="form-control" placeholder="حكمة، اقتباس، شعر..." value="{{ old('meaning_type', $paper->meaning_type ?? '') }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">التصنيف *</label>
        <select name="category_id" class="form-select" required>
            <option value="">— اختر —</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $paper->category_id ?? '') == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">الحالة *</label>
        <select name="status" class="form-select" required>
            <option value="unverified" @selected(old('status', $paper->status ?? 'unverified') === 'unverified')>غير موثّقة</option>
            <option value="verified" @selected(old('status', $paper->status ?? '') === 'verified')>موثّقة</option>
        </select>
    </div>
</div>
