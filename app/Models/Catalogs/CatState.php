<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatState extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'cat_estados';

    public function municipios(){
        return $this->hasMany(CatMunicipality::class,'id_estado');
    }
}
