<?php
namespace pwf\Http\Controllers;
use App\Http\Controllers\DenunciaController;
use App\Models\Catalogs\CatAsentamientos;
use App\Models\Catalogs\CatCountries;
use App\Models\Catalogs\CatMunicipality;
use App\Models\Catalogs\CatState;
use App\Mail\RegistroDenunciaMailable;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Catch_;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', 'DenunciaController@index')->name('denuncia.index');
Route::get('/', [DenunciaController::class, 'index'])->name('denuncia.index');
Route::get('DenunciaDigital/municipios/{estado}/catalogo',[DenunciaController::class,'getMunicipios'])->name('getMunicipios');
Route::post('store', [DenunciaController::class, 'store'] )->name('denuncia.store');
Route::get('consulta', [DenunciaController::class, 'show'] )->name('denuncia.consulta');
Route::post('consultaDenuncia', [DenunciaController::class, 'consultaDenuncia'] )->name('denuncia.consultaDenuncia');
Route::get('denuncia/consulta/{folio}', [DenunciaController::class, 'consultaD'] )->name('denuncia.consultaD');
Route::get('prueba', [DenunciaController::class, 'AcuseRegistro'] )->name('denuncia.prueba');
Route::get('generarPDF/{folio}', [DenunciaController::class, 'generarPDF'])->name('denuncia.generarPDF');
Route::get('pruebaw', function(){

	$recipients = '524431401809'; // Asigna el valor de la variable
	// $data = array(
	// 	"recipients" => $recipients,
	// 	"template_id" => "b15fd3ef-a679-419a-8124-2cbd9173919d",
	// 	"contact_type" => "phone"
	// );
	// $json_data = json_encode($data);
    // $curl = curl_init();
	// curl_setopt_array($curl, array(
	// CURLOPT_URL => 'https://api.wasapi.io/prod/api/v1/whatsapp-messages/send-template',
	// CURLOPT_RETURNTRANSFER => true,
	// CURLOPT_ENCODING => '',
	// CURLOPT_MAXREDIRS => 10,
	// CURLOPT_TIMEOUT => 0,
	// CURLOPT_FOLLOWLOCATION => true,
	// CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	// CURLOPT_CUSTOMREQUEST => 'POST',
	// CURLOPT_POSTFIELDS => $json_data,
	// CURLOPT_HTTPHEADER => array(
	// 	'accept: application/json',
	// 	'Authorization: Bearer 8652|pnUyKh8t155X39yJpGFhCPkVKlg2Ng6ZPDhQa0mP',
	// 	'Content-Type: application/json'
	// ),
	// ));

	// $response = curl_exec($curl);

	// curl_close($curl);
	// echo $response;

	$message = "Mensaje personalizado";
	$curl = curl_init();
	$data = array(
		"recipients" => $recipients,
		"template_id" => "ab9c3c57-4828-46dd-ad87-0277f155fc73",
		"contact_type" => "phone",
		"body_vars" => array(
			array(
				"text" => "{{1}}",
				"val" => $message
			)
		)
	);
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.wasapi.io/prod/api/v1/whatsapp-messages/send-template',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
	CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => array(
        'accept: application/json',
        'Authorization: Bearer 8178|09aFInEo2NKoZLg9270oou2PXTA10jbwtFkQrT63',
        'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
});


Route::get('prueba', function(){
		$folio = "PD/XXX55";
        $token = "Pasffefeasfs";
        $nombre = "Alejandro";
        $PrimerApellido = "Almonte";
        $SegundoApellido = "Acosta";
        $correo = "sistemas.ingresos@gmail.com";
        $rutaAcuse = "C:\PLANTILLAS FGE\Denuncia\public\acuse/acuse_112.pdf";
    
        $info = new \stdClass;
        $info->nombre = $nombre.' '.$PrimerApellido.' '.$SegundoApellido;
        $info->folio = $folio;
        $info->email = $correo;
        $info->asunto = 'Denuncia en Línea FGE';
        $info->token = $token;
        $info->mensaje = 'El registro de su Denuncia se realizó de forma correcta, asignándole el folio '.$folio.' y la clave de seguimiento '.$token.', Su denuncia en línea será analizada por el Agente de Ministerio Público Orientador Digital, quien la asignará a la Fiscalía correspondiente para su seguimiento, atención y comunicación con usted. Esté al pendiente del correo/teléfono proporcionado.';
        //$info->sede1 = $sede1;
        //$info->sede2 = $sede2;
    
        setlocale(LC_TIME, 'spanish');
        $fecha = Carbon::now();
        $fecha = strftime("%A, %d de %B del %Y", strtotime($fecha));
        $info->fecha = utf8_encode($fecha);
		Mail::to($correo)->
		send(new RegistroDenunciaMailable($info,$rutaAcuse));
		//unlink($rutaAcuse);
		// return $correo;
})->name('denuncia.prueba');





Route::get('registroExitoso', function(){
	$folio = "PD/XXX55";
	$token = "Pasffefeasfs";
	return view("DenunciaDigital.Registro_exitoso",compact("folio","token"));
})->name('denuncia.prueba');

Route::get('getColonias/{cp}',function($cp){
	$principal = CatAsentamientos::where("codigo_postal",$cp)->orderBy("nombre_asentamiento");
	$total = $principal->count();
	if($total > 0){

		$colonias = $principal->get();
		$municipio = $principal->first()->municipio()->first()->nombre_municipio;
		$estado = $principal->first()->municipio()->first()->estado()->first()->nombre_estado;
		$data = ["colonias" => $colonias,"estado" => $estado, "municipio" => $municipio];
	}else{
		$colonias = array();
		$data = ["colonias" => $colonias];

	}
	return response()->json($data, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
});


Route::get('get-curp/{curp}', function ($curp) {

	// dd( Str::substr($curp, 11, 2));
    $curp = strtoupper($curp);
	$endpoint = "https://serviciosweb.api.michoacan.gob.mx/api/consultacurp/{$curp}";
	$res = Http::withBasicAuth('RENAPO_FGE', 'Lq7VH0J#01y5')->get($endpoint, ['verify' => false]);
	$renapo = json_decode($res->getBody(), true);
    // dd($renapo);
	if ($renapo['statusOper'] == 'EXITOSO') {

		# Pais
		// $pais = App\Models\Pais::where('Abreviacion', $renapo["nacionalidad"])->first();
        $pais = CatCountries::where('id', 118)->first();
        $renapo = array_merge($renapo, ['pais_id' => $pais->id, 'pais_nombre' => $pais->nacionalidad]);
		// dd($renapo['fechNac']);
		$fechaNacF = Carbon::createFromFormat('d/m/Y', $renapo['fechNac'])->format('Y-m-d');
        $renapo = array_merge($renapo, ['fechaNacF' => $fechaNacF]);

		if ($renapo['nacionalidad'] == 'MEX' &&  Str::substr($curp, 11, 2) !== "NE") {

			# Entidad
			// $entidad = App\Models\Entidad::where('CodigoRenapo', Str::substr($curp, 11, 2))->first();
            $entidad = CatState::where('clave_renapo', Str::substr($curp, 11, 2))->first();
            $renapo = array_merge($renapo, ['entidad_id' => $entidad->id, 'entidad_nombre' => $entidad->nombre_estado]);

			# Municipio
			// puede fallar debido a que cveMunicipioReg puede ser nulo o un numero de munucipio no valido
			$municipio = CatMunicipality::where('id_estado', $entidad->id)->where('clave_municipio', intval( $renapo['cveMunicipioReg'] ) )->first();
			$renapo = array_merge($renapo, ['municipio_id' => isset($municipio) ? $municipio->id : 0, 'municipio_nombre' => isset($municipio) ? $municipio->nombre_municipio : '---']);
		}
	}

	return response()->json($renapo, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
})->name('get_curp');

