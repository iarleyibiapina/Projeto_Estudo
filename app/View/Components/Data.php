<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Data extends Component
{
    /**
     * Create a new component instance.
     * 
     * recupera dado passado por meio de :num="$var"
     */
    public function __construct(
        protected bool $num
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // pode pegar dados do controller e trabalhar de forma dinamica
        $dados = "Texto";
        $num = $this->num;
        return view('components.data', compact('dados', 'num'));
    }
}
