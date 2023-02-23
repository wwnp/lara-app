<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Badge extends Component
{
    public string $title;
    public string $class;
    public array $classes = [
        "primary",
        "secondary",
        "success",
        "danger",
        "warning",
        "info",
        "light",
        "info",
        "dark",
    ];
    public function __construct(
        string $title = ""
    ) {
        $this->title = $title;
        $this->class = $this->randomClass();
    }

    public function randomClass(): string
    {
        $index = array_rand($this->classes, 1);
        return $this->classes[$index];
    }

    public function render()
    {
        return view('components.badge');
    }
}
