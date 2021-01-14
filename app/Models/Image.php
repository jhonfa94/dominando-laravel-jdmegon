<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'path',
    ];

    /**
     * Relacion de uno que nos sirve para usuario y productos
     * 
     * morphTo: Identifica automaticamente el campo para la relacion
     * para este caso resuelve si es una imagen o producto
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
