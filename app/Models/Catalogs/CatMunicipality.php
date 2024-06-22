<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatMunicipality extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'cat_municipios';

    public static function municipios($estado){
        return CatMunicipality::where('id_estado','=',$estado)->orderBy('nombre_municipio','asc')->get();
      }

    public function asentamientos(){
      return $this->hasMany(CatAsentamientos::class, 'id_municipio');
    }

    public function estado(){
      return $this->belongsTo(CatState::class,'id_estado');
    }
}
