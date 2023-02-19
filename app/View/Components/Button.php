<?php

namespace App\View\Components;

use App\Enums\ButtonTypes;
use Illuminate\View\Component;

class Button extends Component
{
    public string $class;
    public string $label;
    public string $id;
    public string $type;
    public string $action;
    public string $method;
    public string $disabled;

    public function __construct(
        string $id,
        string $type,
        bool $disabled = false
    ) {
        $this->id = $id;
        $this->type = $type;
        $this->disabled = $disabled ? "disabled" : "";
        switch ($type) {
            case ButtonTypes::DELETE->value:
                $this->deleteType();
                break;
            case ButtonTypes::APPROVE->value:
                $this->approveType();
                break;
            case ButtonTypes::DECLINE->value:
                $this->declineType();
                break;
            case ButtonTypes::RESTORE->value:
                $this->restoreType();
                break;
        }
    }
    public function deleteType()
    {
        $this->class = "danger";
        $this->label = "X";
        $this->action = route("comments.destroy", [$this->id]);
        $this->method = "delete";
    }
    public function approveType()
    {
        $this->class = "success";
        $this->label = "+";
        $this->action = route("comments.approve", [$this->id]);
        $this->method = "put";
    }
    public function declineType()
    {
        $this->class = "warning";
        $this->label = "-";
        $this->action = route("comments.decline", [$this->id]);
        $this->method = "put";
    }
    public function restoreType()
    {
        $this->class = "info";
        $this->label = "R";
        $this->action = route("comments.restore", [$this->id]);
        $this->method = "put";
    }
    public function render()
    {
        return view('components.controls.button');
    }
}
