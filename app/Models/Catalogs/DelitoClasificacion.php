<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DelitoClasificacion extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'cat_delitos';
}
