<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
	protected $connection = 'usuarios_sistemas';
	protected $table    = 'logs';
	protected $primaryKey = 'id';
	const UPDATED_AT = NULL;

	protected $visible = [
		'id',
		'id_sistema',
		'id_usuario',
		'id_accion',
		'modulo',
		'ip',
		'created_at',
		'data_log',
		'log',
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'id_usuario')->withTrashed();
	}
}
