<x-layouts.main 
    title="Create category"
> 
    <h3 class="h3">Create </h3>

    <x-form
        method="post"   
        action="{{ route('categories.store')}}"
    >
        @include('categories.admin.form')
        <button>Create</button>
    </x-form>
</x-layouts.main>