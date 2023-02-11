<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Collection;

class Select extends Component
{
    public array $options;
    public string $name;
    public ?string $item = null;

    public function __construct(
        Collection $options,
        string $name,
        ?string $item = null,
    ) {
        $this->options = $options->toArray();
        $this->name = $name; // id_cat
        $this->item = $item;
    }

    public function selected(): string
    {
        $oldParams = old(); // Array ( [_token] => EBtnIR3d...F8vCWxTuH [name] => 123 [desc] => [id_cat] => 2 )
        $oldExists = array_key_exists($this->name, $oldParams); // array_key_exists(id_cat, $oldParams) 
        $oldValue = $oldExists ? $oldParams[$this->name] : ""; // "2" || ""
        $hasItem = $this->item !== null;
        $selectedValue = $oldExists ? $oldValue : ($hasItem ? $this->item[$this->name] : ""); // (2 || ") || 
        return $selectedValue;
    }

    public function render()
    {
        return view('components.controls.select');
    }
}
