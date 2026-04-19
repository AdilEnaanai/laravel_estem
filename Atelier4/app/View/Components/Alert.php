<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public $type;

    private $colors = [
        'success' => ['bg' => '#d4edda', 'border' => '#c3e6cb', 'text' => '#155724'],
        'error' => ['bg' => '#f8d7da', 'border' => '#f5c6cb', 'text' => '#721c24'],
        'warning' => ['bg' => '#fff3cd', 'border' => '#ffeaa7', 'text' => '#856404'],
        'info' => ['bg' => '#d1ecf1', 'border' => '#bee5eb', 'text' => '#0c5460'],
    ];

    public $bgColor;
    public $borderColor;
    public $textColor;
    
    public function __construct($type = 'success')
    {
        $this->type = $type;
        $this->bgColor = $this->colors[$this->type]['bg'];
        $this->borderColor = $this->colors[$this->type]['border'];
        $this->textColor = $this->colors[$this->type]['text'];
    }
    public function render(): View|Closure|string
    {
        return view('components.alert', [
            'bgColor' => $this->bgColor, 
            'borderColor' => $this->borderColor, 
            'textColor' => $this->textColor
            ]);
    }
}
