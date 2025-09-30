<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarMenu extends Component
{
    public string $route;
    public string $icon;
    public string $label;
    public string $activePattern;
    public function __construct(string $route, string $icon, string $label, ?string $activePattern = null)
    {
        $this->route = $route;
        $this->icon = $icon;
        $this->label = $label;
        $this->activePattern = $activePattern ?? preg_replace('/\.\w+$/', '.*', $route);
    }


    public function render(): View|Closure|string
    {
        return view('components.sidebar-menu');
    }
}
