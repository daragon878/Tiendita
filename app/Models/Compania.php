<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compania extends Model
{
    use HasFactory;

    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $table ="compania";
    public $updated_at = false;
    public $created_at = false;

    protected $fillable = [
        'Ruc',
        'Razzon_Social',
        'Sucursal',
        'Direccion',
        'Num_Telefono',
        'Correo',
        'Rugro'
    ];

}
