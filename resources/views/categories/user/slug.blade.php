<x-layouts.main 
    title="Create category"
> 
{{ dd($category->posts()) }}
{{-- @foreach ($category as $i)
    <h1>{{ $good["name"] }}</h1>
    <hr>
@endforeach --}}
</x-layouts.main>