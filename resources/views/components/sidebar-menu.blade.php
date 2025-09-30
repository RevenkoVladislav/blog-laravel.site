<li class="nav-item">
    <a href="{{ route($route) }}"
       class="nav-link {{ request()->routeIs($activePattern) ? 'text-secondary fw-bold bg-white rounded' : '' }}">
        <i class="nav-icon {{ $icon }}"></i>
        <p>
            {{ $label }}
        </p>
    </a>
</li>
