<x-layouts.main 
    title="Create category"
> 
<h1>GOODS</h1>
<a href="{{ route('goods.create') }}">Add good</a>
<hr>
@foreach($goods as $good)
    <h2>{{ $good->name }}</h2>
    <a href="{{ route('goods.show', [ $good->id ]) }}">more...</a>
    <hr>
@endforeach
</x-layouts.main>