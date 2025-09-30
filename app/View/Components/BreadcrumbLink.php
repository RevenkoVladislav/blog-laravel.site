<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BreadcrumbLink extends Component
{
    public string $route;
    public string $label;
    public string $activePattern;
    public function __construct(string $route, string $label, ?string $activePattern = null)
    {
        $this->route = $route;
        $this->label = $label;
        $this->activePattern = $activePattern ?? preg_replace('/\.\w+$/', '.*', $route);
    }


    public function render(): View|Closure|string
    {
        return view('components.breadcrumb-link');
    }
}
