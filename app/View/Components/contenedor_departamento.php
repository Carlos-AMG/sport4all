<?php

namespace App\View\Components;

use App\Models\Departamento;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class contenedor_departamento extends Component
{
    /**
     * Create a new component instance.
     */
    public $departamento;

    public function __construct(Departamento $departamento)
    {
        $this->departamento = new Departamento();
        $this->departamento = $departamento;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.contenedor_departamento');
    }
}
