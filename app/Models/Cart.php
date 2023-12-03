<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $timestamp = false;

    public function Producto(){
        return $this->belongsTo(Producto::class);
    }

    // public function user(){
    //     return $this->belongsTo(User::class);
    // }

    // public function producto(){
    //     return $this->belongsToMany(Producto::class,'pivote_carrito');
    // }
    // public function producto(){
    //     return $this->belongsToMany(Producto::class,'pivote_carrito');
    // }

    protected $fillable = ['user_id','producto_id','quantity'];
}
