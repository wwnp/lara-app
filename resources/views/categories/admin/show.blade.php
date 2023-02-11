<x-layouts.main 
    title="Create category"
> 
    <h1>{{ $category->title }}</h1>
    <a href="{{ route('categories.index') }}">Back</a>
    <hr>
    <em>{{ $category->created_at }}</em>
    <div>{{ $category->desc  }}</div>
    <hr>
    <a href="{{ route('categories.edit', [ $category->id ]) }}">Edit</a>
    <form method="post" action="{{ route('categories.destroy', [ $category->id ]) }}">
        @csrf
        @method('DELETE')
        <button>Delete</button>
    </form>
</x-layouts.main>