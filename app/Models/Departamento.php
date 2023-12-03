<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Departamento extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    public function Productos(){
        return $this ->hasMany(Producto::class);
    }
    public function Empleados(){
        return $this ->hasMany(User::class);
    }

    protected $fillable = ['nombre','descripcion'];
}
