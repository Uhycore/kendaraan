<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Toast extends Component
{
    public $bgColor;
    public $title;

    public function __construct($bgColor = 'bg-success', $title = 'Notification')
    {
        $this->bgColor = $bgColor;
        $this->title = $title;
    }

    public function render()
    {
        return view('components.toast');
    }
}
