<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $fillable = ['id', 'nombre', 'descripcion', 'precio', 'stock', 'imagen', 'estado'];
    /** @use HasFactory<\Database\Factories\ProductosFactory> */
    use HasFactory;
}
