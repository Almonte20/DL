<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // MARK: CONST's
	// actions
    const 	CREATION 	= 1;	// CREACIÓN
	const 	READ 		= 2;	// LECTURA
	const 	UPDATE 		= 3;	// ACTUALIZACIÓN
	const 	DELETE 		= 4;	// ELIMINACIÓN
	const 	LOG_IN 		= 5;	// INICIAR SESIÓN
	const 	LOG_OUT 	= 6;	// CERRAR SESIÓN
	const 	EXPORT 		= 7;	// EXPORTAR
	const 	IMPORT 		= 8;	// IMPORTAR
	const 	RESTORE 	= 9;	// RESTAURAR
	const 	ATTEND 		= 10;	// ATENDER
	const 	ASSIGN 		= 11;	// ASIGNAR
	const 	EMAIL 		= 12;	// CORREO

    // FOR FUNCTION FORMATDATE
	const SMALL_DATE_TIME = 'smalldatetime';
	const SMALL_DATE_TIME_FORMAT = 'smalldatetimeformat';
	const BASIC_DATE = 'basicdate';
	const BASIC_DATE_ENGLISH = 'basicdateenglish';

	// FOR FILE
	const DISK = 'buffalo';


    public static function saveLog(int $id_action, string $modulo, null|string $logDesc = null, null|array $data_log = null): string
	{
		try {
			DB::beginTransaction();

			$log = new Log();
			
			$log->id_sistema = config('fge.ID_SISTEMA');
			$log->id_accion = $id_action;
			$log->modulo = $modulo;
			$log->ip = request()->ip();
			$log->log = $logDesc;
			$log->data_log = json_encode($data_log);
			$log->save();
			// User::find(auth()->user()->id)->notify(new TestNotication($logDesc));

			DB::commit();
			return $log;
		} catch (Exception $e) {
			DB::rollback();
			throw $e;
		}
	}
}
