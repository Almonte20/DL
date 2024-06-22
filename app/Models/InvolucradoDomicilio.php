<?php

namespace App\Models;

use App\Models\Catalogs\CatAsentamientos;
use App\Models\Catalogs\CatCountries;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class InvolucradoDomicilio extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'sis_denuncia_linea_involucrado_domicilio';

    public function colony(): BelongsTo
	{
		return $this->belongsTo(CatAsentamientos::class, 'id_asentamiento');
	}

	public function country(): BelongsTo
	{
		return $this->belongsTo(CatCountries::class, 'id_pais');
	}
}
