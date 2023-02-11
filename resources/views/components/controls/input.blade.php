@props([ 'name' => "default name", 'label' => "default label", 'type' => 'text', 'id' => null, 'defaultValue' => '', ])

@php
    // instead better add class component ;  laravel-lavric lesson3 01:47:51
    // $id = $name . "-" . bin2hex(random_bytes(5));
    // or
    $id = $name . "-" . "field";
@endphp

<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input
        type="{{ $type }}" 
        class="form-control @error($name) is-invalid @enderror" 
        id="{{ $id  }}" 
        aria-describedby="{{ $name }}" 
        name="{{ $name }}" 
        value="{{ old($name) ?? $defaultValue }}" 
        placeholder="Enter {{ $label }}"
    >
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
