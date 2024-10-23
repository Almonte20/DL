<?php

namespace App\Models;

use App\Models\Catalogs\CatAsentamientos;
use App\Models\Catalogs\CatCountries;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Involucrado extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'sis_denuncia_linea_involucrado';
    use SoftDeletes;
    protected $fillable = ['id'];

    public function country(): BelongsTo
    {
      return $this->belongsTo(CatCountries::class, 'id_nacionalidad');
    }
  
    public function address(): HasOne
    {
      return $this->hasOne(InvolucradoDomicilio::class, 'id_involucrado');
    }
}
