<x-layouts.main 
    title="Create category"
> 
    <h1>Category</h1>
    <a href="{{ route('categories.create') }}">Add category</a>
    <a href="{{ route('categories.trash') }}">Trash</a>
    <hr>
    @foreach($categories as $category)
        <h2>{{ $category->title }}</h2>
        <em>{{ $category->created_at }}</em><br>
        <a href="{{ route('categories.show', [ $category->id ]) }}">more...</a>
        <hr>
    @endforeach
</x-layouts.main>




