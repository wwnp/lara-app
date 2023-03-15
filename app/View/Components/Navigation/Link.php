<?php

namespace App\View\Components\Navigation;

use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

// class Link extends Component
// {
//     // protected string $isActive;
//     protected string $routeName;
//     // protected string $slug;
//     public function __construct(
//         string $routeName,
//         // string $slug,
//     ) {
//         $this->routeName = $routeName;
//         // $this->routeName = $slug;

//         // $givenRoute = Route::current()->getName() . "/" . Route::current()->parameter("slug");
//         // dd($givenRoute);
//     }

//     public function render()
//     {
//         return view('components.navigation.link');
//     }
// }
class Link extends Component
{
    public bool $isActive;
    public string $completedRoute;
    // public ?int $id;

    public function __construct(
        string $routeName,
        string $id = null,
    ) {
        $this->completedRoute = route($routeName, $id);

        $givenRoute = Route::current()->getName() . "/" . Route::current()->parameter("slug");
        $addressRoute = $routeName . "/" . $id;
        // dd($givenRoute, $addressRoute);
        // dd(Route::current());
        // dd(Route::current()->getName());
        // dd(Route::current()->parameter("slug"));
        $this->isActive =  $givenRoute === $addressRoute;
    }

    public function render()
    {
        return view('components.navigation.link');
    }
}
