<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Player extends Component
{
    public $name;
    public $photoURL;

    public function __construct($name, $photoURL, $description = '')
    {
        $this->name = $name;
        $this->photoURL = $photoURL;

    }

    public function render(): View|Closure|string
    {
        return view('components.player',[
            'name' => $this->name,
            'photoURL' => $this->photoURL,
        ]);
    }
}
