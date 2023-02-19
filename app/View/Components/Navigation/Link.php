<?php

namespace App\View\Components\Navigation;

use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Link extends Component
{
    public bool $isActive;
    public string $routeName;

    public function __construct(
        string $routeName,
    ) {
        $this->routeName = route($routeName);
        $this->isActive = Route::current()->getName() === $routeName;
    }

    public function render()
    {
        return view('components.navigation.link');
    }
}
