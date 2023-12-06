<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Compra extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = ['fecha','proveedor', "iva"];
    public function detalleCompras()
    {
        return $this->hasMany(DetalleCompra::class);
    }
}

