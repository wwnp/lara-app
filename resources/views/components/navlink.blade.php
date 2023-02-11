<li class="nav-item">
    <a 
    class="nav-link
        @if ($isActive)
            active
        @endif
    " 
    href="{{ $href}}"
    >
        {{ $slot }}
    </a>
</li>