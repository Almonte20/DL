<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificacionUsuario extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'sis_notificaciones_usuario';
}
