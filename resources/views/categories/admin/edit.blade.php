<x-layouts.main 
    title="Create category"
> 
    <form method="post" action="{{ route('categories.update', [ $category->id ]) }}">
        @method('PUT')
        @include('categories/admin/form')
        <button class="btn btn-success mt-4">Update</button>
    </form>
</x-layouts.main>
// ?? -null safety