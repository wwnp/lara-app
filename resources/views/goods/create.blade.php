{{-- @php
    dd($cats);
@endphp --}}

<x-layouts.main
    title="Create category"
> 
    <h3 class="h3">Create </h3>
    <form method="post" action="{{ route("goods.store") }}">
        @csrf
        <x-controls.input name="name" label="Name" type="text" />
        <x-controls.input name="desc" label="Description" type="text"   />
        <x-select
         name="id_cat" 
         :options="[1=>'a', 2=> 'b']" 
         :item="null"
         >
        </x-select>
        <button>Send</button>
    </form>
</x-layouts.main>

