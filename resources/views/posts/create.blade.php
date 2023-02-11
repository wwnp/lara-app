<x-layouts.main 
    title="Create category"
> 
<h1>FORM</h1>
<x-form method="post" action="{{ route('posts.store') }}">
    @include('posts.form-fields')
    <button>Create</button>
</x-form>
</x-layouts.main>