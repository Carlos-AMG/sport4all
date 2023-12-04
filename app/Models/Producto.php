<?php

namespace App\Models;

use Database\Factories\ProductoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Factura;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    // Para indicar que no se guarde un dato en cierta columna
    public $timestamps = false;


    // public function cart(){
    //     return $this->belongsToMany(Cart::class,'pivote_carritos');
    // }

    public function cart()
    {
        return $this->belongsToMany(User::class,'cart');
    }

    public function Departamento(){
        return $this->belongsTo(Departamento::class);
    }

    public function marca()
    {
        return $this->belongsTo(Marcas::class);
    }

    public function facturas()
    {
        return $this->belongsToMany(Factura::class, 'Detalle__Facturas')
            ->withPivot('cantidad', 'precio');
    }

    protected $fillable = ['nombre','existencia','precio','descripcion','imagen','departamento_id', 'marca_id'];
}
