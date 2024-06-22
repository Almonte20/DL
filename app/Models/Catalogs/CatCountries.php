<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatCountries extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'cat_paises';
}
