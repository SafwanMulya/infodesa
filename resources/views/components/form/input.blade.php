@props(['label', 'name', 'type' => 'text', 'value' => '', 'accept' => ''])

<div class="mb-2">
    <label>{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}" class="form-control" {{ $accept ? 'accept='.$accept : '' }} required>
</div>
