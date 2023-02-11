<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Navlink extends Component
{
    public string $routeName;
    public bool $isActive;
    public string $href;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $routeName)
    {
        $this->routeName = $routeName;
        $this->isActive = Route::current()->getName() === $routeName;
        $this->href = route($routeName);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navlink');
    }
}
