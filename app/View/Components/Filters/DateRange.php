<?php

namespace App\View\Components\Filters;

class DateRange extends Field
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return "components.$this->theme.filters.date-range";
    }
}