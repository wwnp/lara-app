<li class="nav-item">
    <a 
    href="{{ $completedRoute }}"
    class="nav-link  @if ($isActive) active @endif"
    >
    {{ $slot }}</a>
</li>