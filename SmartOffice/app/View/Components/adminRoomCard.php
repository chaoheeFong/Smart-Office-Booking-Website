<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class adminRoomCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $isApproved = true | false;

    public function __construct($isApproved = true)
    {
       
            $this->isApproved = $isApproved;//
        
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-room-card');
    }
}
