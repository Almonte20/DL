<?php

namespace App\Models;

use App\Models\Catalogs\CatTipoEvidencia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evidencia extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'sis_denuncia_linea_evidencia';

    public function type():BelongsTo
	{
		return $this->belongsTo(CatTipoEvidencia::class, 'id_tipo_evidencia');
	}
}
