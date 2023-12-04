<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    use HasFactory;

    public function Productos()
    {
        return $this->hasMany(Producto::class);
    }
    
    protected $fillable = ['nombre','descripcion'];
}
