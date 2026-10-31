@php $diwan = $diwan ?? null; @endphp

<div class="mb-3">
    <label class="form-label">عنوان الديوان *</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $diwan->title ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">الشاعر</label>
    <input type="text" name="poet" class="form-control" value="{{ old('poet', $diwan->poet ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">الوصف</label>
    <textarea name="description" rows="4" class="form-control">{{ old('description', $diwan->description ?? '') }}</textarea>
</div>

<div class="row">
    <div class="col-md-8 mb-3">
        <label class="form-label">رابط صورة الغلاف</label>
        <input type="url" name="cover_image" class="form-control" value="{{ old('cover_image', $diwan->cover_image ?? '') }}" placeholder="https://...">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">السعر (جنيه مصري) *</label>
        <input type="number" step="0.01" min="0" name="price" class="form-control" value="{{ old('price', $diwan->price ?? '0') }}" required>
    </div>
</div>
