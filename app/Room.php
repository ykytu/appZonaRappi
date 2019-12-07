<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public $timestamps = false;

    protected $fillable = [
    'nombre',
	'ubicacion',
	'precio',
	'contacto',
	'descripcion',
	'foto_principal',
	'foto_secundaria',
	'foto_auxiliar',
	'site'
    ];
}
