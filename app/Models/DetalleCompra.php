<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DetalleCompra extends Model
{
    use HasFactory;


    protected $fillable = ['compra_id','producto_id', 'cantidad', 'precio_unitario', 'subtotal'];
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
    
}
