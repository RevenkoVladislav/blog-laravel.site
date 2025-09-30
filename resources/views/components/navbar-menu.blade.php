<li class="nav-item d-none d-sm-inline-block">
    <a href="{{ route($route) }}"
       class="nav-link {{ request()->routeIs($activePattern) ? 'text-secondary fw-bold bg-info rounded' : '' }}">
        {{ $label }}</a>
</li>
