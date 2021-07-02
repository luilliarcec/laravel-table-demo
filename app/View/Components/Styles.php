<?php

namespace App\View\Components;

use Illuminate\Support\Arr;

class Styles extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return "components.$this->theme.styles";
    }
}