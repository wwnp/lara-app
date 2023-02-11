<x-layouts.main 
    title="Create category"
> 
<a href="{{ route('categories.index') }}">Index</a>
@foreach ($trash as $item)
    <h1>{{ $item->title }}</h1>
    <p>{{ $item->slug }}</p>
    <p>{{ $item->deleted_at }}</p>
    <p>{{ $item->id }}</p>
    <form action="{{ route("categories.restore", [$item->id]) }}" method="post">
        @csrf
        @method('PUT')
        <button>Restore</button>
    </form>
    <form action="{{ route("categories.permadestroy", [$item->id]) }}" method="post">
        @csrf
        @method('PUT')
        <button>Delete Forefer</button>
    </form>
    <hr>
@endforeach
</x-layouts.main>