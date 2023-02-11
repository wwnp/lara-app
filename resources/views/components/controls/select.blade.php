{{-- @php
    echo '<pre style="border: 1px solid #000; height: auto; overflow: auto; margin: 0.5em;">';
    echo " old() <hr />";
    print_r(old());
    echo '</pre>';
    echo '<hr>';
@endphp --}}

<div>
    <select 
    name="{{ $name }}" 
    class="form-select
    @error($name) is-invalid @enderror" 
    aria-label="Default select example"
    >
        <option @selected($selected() === '') disabled value="">Выберите категорию</option>
        @foreach ($options as $value => $text)
            <option @selected($selected() === strval($value)) value="{{ $value }}">{{ $text }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>