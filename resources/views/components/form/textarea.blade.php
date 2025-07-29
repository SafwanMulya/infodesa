@props(['label', 'name'])

<div class="mb-2">
    <label>{{ $label }}</label>
    <textarea name="{{ $name }}" class="form-control" required>{{ old($name) }}</textarea>
</div>
