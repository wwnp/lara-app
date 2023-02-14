<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public string $class;
    public string $label;
    public string $routeName;
    public string $id;
    public string $action;
    public string $method;

    public function __construct(
        string $class,
        string $label,
        string $routeName,
        string $id,
        string $method
    ) {
        $this->class = $class;
        $this->label = $label;
        $this->routeName = $routeName;
        $this->id = $id;
        $this->action = route($routeName, [$id]);
        $this->method = $method;
    }
    public function render()
    {
        return view('components.button');
    }
}
