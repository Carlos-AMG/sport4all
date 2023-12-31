<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Factura extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['factura_id','producto_id','cantidad','precio'];
}
