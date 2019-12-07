<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

	public $timestamps = false;

    protected $fillable = [
    'fecha_inicio',
	'fecha_fin',
	'room',
	'user',
	'created_at',
	'updated_at'
    ];
}
