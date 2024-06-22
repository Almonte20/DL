<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatTipoEvidencia extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'cat_tipos_evidencias';
}
