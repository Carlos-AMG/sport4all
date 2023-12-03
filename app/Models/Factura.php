<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Factura extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'detalle__facturas')
            ->withTrashed()
            ->withPivot('cantidad', 'precio');
    }

    protected $fillable = ['fecha','user_id'];
}
