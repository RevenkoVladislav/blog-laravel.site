<li class="breadcrumb-item">
    <a href="{{ route($route) }}"
        class="{{ request()->routeIs($activePattern) ? 'text-secondary fw-bold bg-blue p-1 rounded' : '' }}">
        {{ $label }}
    </a>
</li>
