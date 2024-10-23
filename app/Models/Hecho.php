<?php

namespace App\Models;

use App\Models\Catalogs\CatAsentamientos;
use App\Models\Catalogs\CatPlaces;
use App\Models\Catalogs\CatState;
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

    public function place(): BelongsTo
	{
		return $this->belongsTo(CatPlaces::class, 'id_lugar');
	}



}
