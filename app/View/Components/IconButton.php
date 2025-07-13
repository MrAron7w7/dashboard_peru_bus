<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class IconButton extends Component
{

    public $href, $color, $icon;


    public function __construct(
        $href = '#',
        $color = 'blue',
        $icon = 'antdesign-delete-o'
    ) {
        $this->href = $href;
        $this->color = $color;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.icon-button');
    }
}
