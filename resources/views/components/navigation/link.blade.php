<li class="nav-item">
    <a 
    href="{{ $routeName }}"
    class="nav-link  @if ($isActive) active @endif"
    >
    {{ $slot }}</a>
</li>