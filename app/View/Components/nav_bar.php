<?php

namespace App\View\Components;

use App\Models\Cart;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class nav_bar extends Component
{
    /**
     * Create a new component instance.
     */
    // public $cantItems = 0;

    public function __construct()
    {
        // $user = Auth::user();
        // $items = Cart::all()->where('user_id',$user->id);
        // foreach($items as $item){
        //     $this->cantItems += $item->quantity;
        // }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav_bar');
    }
}
