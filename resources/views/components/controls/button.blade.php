<form method="post" action="{{ $action  }}">
    @csrf
    @method($method)
    <button class="btn btn-{{$class}} {{ $disabled }} ">{{ $label }}</button>
</form>