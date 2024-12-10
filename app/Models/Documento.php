<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'sis_documentos';
    protected $fillable = ['ruta'];
}
