<?php

namespace Modules\Autos\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Autos\Database\Factories\AutoFactory;

class Auto extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): AutoFactory
    // {
    //     // return AutoFactory::new();
    // }
}
