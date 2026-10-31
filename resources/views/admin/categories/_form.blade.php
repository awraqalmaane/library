@php $category = $category ?? null; @endphp

<div class="mb-3">
    <label class="form-label">اسم التصنيف *</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $category->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">الرابط المختصر (slug)</label>
    <input type="text" name="slug" class="form-control" value="{{ old('slug', $category->slug ?? '') }}" placeholder="يُولّد تلقائيًا إذا تُرك فارغًا">
</div>

<div class="mb-3">
    <label class="form-label">الوصف</label>
    <textarea name="description" rows="3" class="form-control">{{ old('description', $category->description ?? '') }}</textarea>
</div>
