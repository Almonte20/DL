<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatAsentamientos extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'cat_asentamientos';

    public function municipio(){
        return $this->belongsTo(CatMunicipality::class, 'id_municipio');
      }

}
