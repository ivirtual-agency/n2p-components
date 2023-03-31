<?php

namespace iVirtual\Net2phone\Components\Layouts;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Master extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('net2phone::layouts.master');
    }
}
