<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'direccion',
        'city'
    ];

}