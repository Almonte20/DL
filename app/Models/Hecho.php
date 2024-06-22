<?php

namespace App\Models;

use App\Models\Catalogs\CatAsentamientos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hecho extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'sis_denuncia_linea_hechos';

    public function colony(): BelongsTo
	{
		return $this->belongsTo(CatAsentamientos::class, 'id_asentamiento');
	}
}
