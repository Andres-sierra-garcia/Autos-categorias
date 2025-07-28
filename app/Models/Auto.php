<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Auto extends Model
{
    use hasFactory;
     protected $table = 'autos';
    protected $fillable =[
        'nombre',
        'descripcion',
        'marca',
        'modelo',
        'categoria_id',
    ];
}
