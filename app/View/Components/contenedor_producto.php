<?php

namespace App\View\Components;

use App\Models\Producto;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class contenedor_producto extends Component
{
    /**
     * Create a new component instance.
     */
    public $producto;
    
    public function __construct(Producto $producto)
    {
        $this->producto = new Producto();
        $this->producto = $producto;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.contenedor_producto');
    }
}
