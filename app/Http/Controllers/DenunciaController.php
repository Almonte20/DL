<?php

namespace App\Http\Controllers ;

use App\Mail\RegistroDenunciaMailable;
use App\Models\Caso;
use App\Models\Catalogs\CatAsentamientos;
use App\Models\Catalogs\CatCountries as CatalogsCatCountries;
use Illuminate\Support\Facades\DB;
use App\Models\Catalogs\CatMunicipality;
use App\Models\Catalogs\CatPlaces;
use App\Models\Catalogs\CatState;
use App\Models\Catalogs\DelitoClasificacion;
use App\Models\Denuncia;
use App\Models\Evidencia;
use App\Models\FirmasDigitales;
use App\Models\Hecho;
use App\Models\Involucrado;
use App\Models\InvolucradoDomicilio;
use App\Models\NotificacionUsuario;
use Carbon\Carbon;
use Codedge\Fpdf\Fpdf\Fpdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Traits\WhatsappTrait;


class DenunciaController extends Controller
{
    use WhatsappTrait;
    /**
     * Display a listing of the resource.
     */

     protected $fpdf;

     public function __construct()
    {

        $this->fpdf = new Fpdf;
    }

    public function index()
    {
        $countries = CatalogsCatCountries::all();
        $estados = CatState::all();
        $municipios = CatMunicipality::all();
        $lugares = CatPlaces::all();
        // dd($paises);

        return view('denuncia2',compact('countries','estados','lugares'));
        return view('denuncia',compact('countries','estados','lugares'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function AcuseRegistro()
    {
        $folio = "PD/XXX55";
        $token = "Pasffefeasfs";
        $nombre = "Alejandro";
        $PrimerApellido = "Almonte";
        $SegundoApellido = "Acosta";
        $correo = "sistemas.ingresos@gmail.com";

        $info = new \stdClass;
        $info->nombre = $nombre.' '.$PrimerApellido.' '.$SegundoApellido;
        $info->email = $correo;
        $info->asunto = 'Denuncia en Línea FGE';
        $info->token = $token;
        $info->mensaje = 'El registro de su Denuncia se realizó de forma correcta, asignándole el folio '.$folio.' y la clave de seguimiento '.$token.', Su denuncia en línea será analizada por el Agente de Ministerio Público Orientador Digital, quien la asignará a la Fiscalía correspondiente para su seguimiento, atención y comunicación con usted. Esté al pendiente del correo/teléfono proporcionado.';
        //$info->sede1 = $sede1;
        //$info->sede2 = $sede2;

        setlocale(LC_TIME, 'spanish');
        $fecha = Carbon::now();
        $fecha = strftime("%A, %d de %B del %Y", strtotime($fecha));
        $info->fecha = $fecha;

        app('App\Email\EmailController')->notificacionDenuncia($info);
        // // $token = "asfasfsa";
    }


    public function generarPDF($id_denuncia)
    {


        $denuncia = Denuncia::where('id', $id_denuncia)->first();
        $folio = $denuncia->folio_denuncia;

        $Datos_Hellman = FirmasDigitales::where('Folio', $folio)->first();

        if ($Datos_Hellman) {
            $firma_predenuncia = $Datos_Hellman->Llave;
        } else {
            $llave = Str::random(256);
            $firma_predenuncia = Crypt::encryptString($llave);

            $Hellman = new FirmasDigitales();
            $Hellman->Llave = $firma_predenuncia;
            $Hellman->Folio = $folio;
            $Hellman->save();
        }

        $this->Generaqr($firma_predenuncia, $id_denuncia);
        // dd($firma_predenuncia);

        $denunciante = Involucrado::where("id_tipo_involucrado","4")->where("id_denuncia",$id_denuncia)->first();

        // $pdf = new Fpdf();
        // Resto del código para generar el PDF
        $pdf = $this->fpdf;
        $pdf->AddPage('L', 'letter');
        // $pdf->AddFont('LabradorA-Black');
        $pdf->SetAutoPageBreak(true,1);

        $pdf->AddFont('LabradorA-Black');
        $pdf->AddFont('LabradorA-Italic');
        $pdf->AddFont('LabradorA-ExtraBold');

        $pdf->Image('img/PDF_Predenuncia/formato_predenuncia2.png',0,0,280,216);

        // Folio
        $pdf->SetXY(155,18);
        $pdf->SetFont('LabradorA-ExtraBold','',25);
        $pdf->SetTextColor(241, 25, 25);
        $pdf->Cell(85,5,$folio,0,0,'L');

        $pdf->SetFont('LabradorA-ExtraBold','',14);
        $pdf->SetTextColor(0, 0, 0);

        //Nombre
        $pdf->SetXY(13,65);
        $pdf->Cell(92,5,utf8_decode($denunciante->nombre),0,0,'L');

        //Paterno
        $pdf->SetXY(13,90);
        $pdf->Cell(92,5,utf8_decode($denunciante->primer_apellido),0,0,'L');

        //Materno
        IF($denunciante->segundo_apellido != ''){
            $Materno = $denunciante->segundo_apellido;
        }else{
            $Materno = '-';
        }

        $pdf->SetXY(13,114);
        $pdf->Cell(92,5,utf8_decode($Materno),0,0,'L');


        //CURP
        $pdf->SetXY(13,138);
        $pdf->Cell(92,5,$denunciante->curp,0,0,'L');
        // dd($denunciante->address()->first()->colony()->first()->nombre_asentamiento);
        //Calle
        IF($denunciante->address()->first()->id_pais != 118){
            $Calle = $denunciante->otro_domicilio;
            $Colonia = '-';
            $NumExt = '-';
            $CP = '-';
        }else{
            $Calle =  $denunciante->address()->first()->calle;
            $Colonia = $denunciante->address()->first()->colony()->first()->nombre_asentamiento;
            $NumExt = $denunciante->address()->first()->numero_exterior;
            $CP = $denunciante->address()->first()->colony()->first()->codigo_postal;
        }

        $pdf->SetXY(115,65);
        $pdf->Cell(92,5,utf8_decode($Calle),0,0,'L');


        //Colonia
        $pdf->SetXY(115,90);
        $pdf->Cell(92,5,utf8_decode($Colonia),0,0,'L');

        //Numero Ext
        $pdf->SetXY(115,114);
        $pdf->Cell(92,5,$NumExt,0,0,'L');

        //CP
        $pdf->SetXY(115,138);
        $pdf->Cell(92,5,$CP,0,0,'L');

        //Firma
        $pdf->SetXY(13,158);
        $pdf->SetFont('LabradorA-Black','',12);
        $pdf->MultiCell(195,4,$firma_predenuncia,0);

        $pdf->Image(public_path("acuse/QR_".$id_denuncia.".png"),225,144,50,50);
        unlink(public_path("acuse/QR_".$id_denuncia.".png"));
        // Resto del código para configurar el PDF
        // $pdf->Output("");
        $rutaArchivo = public_path('acuse/acuse_'.$id_denuncia.'.pdf');
        $this->fpdf->Output('F', $rutaArchivo);
        $rutaGuardado = "DenunciaEnLinea/".$id_denuncia;
        // $ruta = Storage::disk('buffalo')->putFileAs($rutaGuardado, $fileImage, $name);
        return $rutaArchivo;
        // exit;
        // return response()->download(public_path('acuse/'.$id_denuncia.'.pdf'));
    }

    public function Generaqr($firma_predenuncia, $IdExpediente)
        {
            QrCode::format('png')->merge('img/PDF_Predenuncia/fge.png', 0.2, true)->size(500)->margin(0)->generate($firma_predenuncia, public_path('acuse/QR_'.$IdExpediente.'.png'));
        }

    public function enviarCorreo($datos){

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
        // dd($request->hasFile('evidencias'));
        DB::beginTransaction();

        try{


        // dd($request);
        // Concatenate date and time

        $curp = $request->curp;
        $nacionalidad = $request->nacionalidad;
        $nombre = $request->nombre;
        $PrimerApellido = $request->PrimerApellido;
        $SegundoApellido = $request->SegundoApellido;
        $fnacimiento = $request->fnacimiento;
        $correo = $request->correo;
        $telefono = $request->telefono;
        $pais = $request->pais;
        $domicilio_extranjero = $request->domicilio_extranjero;
        $CP = $request->CP;
        $municipio = $request->municipio;
        $ciudadId = $request->ciudadId;
        $municipio_residencia = $request->municipio_residencia;
        $asentamiento_residencia = $request->asentamiento_residencia;
        $calle = $request->calle;
        $numext = $request->numext;
        $numint = $request->numint;
        $fechaintervalo = $request->fechaintervalo;
        $fecha_inicial = $request->fecha_inicial;
        $hora_inicial = $request->hora_inicial;
        $fecha_final = $request->fecha_final;
        $hora_final = $request->hora_final;
        $narrativa = $request->narrativa;
        $coordenadas = $request->coordenadas;
        $carretera = $request->carretera;
        $km_hechos = $request->km_hechos;
        $descripcion_lugar = $request->descripcion_lugar;
        $codigo_postal = $request->codigo_postal;
        $latitud = $request->latitud;
        $longitud = $request->longitud;
        $domicilio_mapa = $request->domicilio_mapa;

        $CP_hechos = $request->CP_hechos;
        $calle_hechos = $request->calle_hechos;
        $municipio_hechos = $request->municipio_hechos;
        $estado_hechos = $request->estado_hechos;
        $numero_hechos = $request->numext_hechos;
        $asentamiento_hechos = $request->asentamiento_hechos;
        $evidencias = $request->evidencias;
        $arrayTestigos = $request->arrayTestigos;

        //ARMADO DEL FOLIO
        $consecMax  = Denuncia::where("anio",date("Y"))->max('consecutivo');
        if (is_null($consecMax) || !is_numeric($consecMax)) {
            $consecMax = 0;
        }
        $consecutivo = $consecMax+1;
        $folio =  "PD/".date('Y').$consecutivo;

        //------



        $denuncia = new Denuncia;
        $denuncia->folio_denuncia = $folio;
        $denuncia->consecutivo = $consecutivo;
        $denuncia->anio = date('Y');
        $denuncia->id_tipo_denunciante = 1;
        $denuncia->id_estatus = 5;
        $token =Str::random(20);
        $denuncia->token_denuncia = $token;
        $denuncia->save();


        $id_denuncia = $denuncia->id;

        $involucrado = new Involucrado();
        $involucrado->curp = $curp;
        $involucrado->nombre = $nombre;
        $involucrado->primer_apellido = $PrimerApellido;
        $involucrado->segundo_apellido = $SegundoApellido;
        $involucrado->fecha_nacimiento = $fnacimiento;
        $involucrado->id_nacionalidad = $nacionalidad;
        $involucrado->email = $correo;
        $involucrado->telefono = $telefono;
        $involucrado->id_tipo_involucrado = 4;
        $involucrado->id_tipo_persona = 1;
        $involucrado->id_denuncia =  $id_denuncia;

        $rutaGuardado = "DenunciaEnLinea/".$id_denuncia;
        if($request->hasfile('credencial')){

            $fileImage = $request->file('credencial');
            $extension = $fileImage->getClientOriginalExtension();
            $name = "Identificacion.".$extension;
            $ruta = Storage::disk('buffalo')->putFileAs($rutaGuardado, $fileImage, $name);
            $involucrado->url_identificacion = $ruta;
        }

        $involucrado->save();



        $involucrado_domicilio = new InvolucradoDomicilio;
        $involucrado_domicilio->id_involucrado = $involucrado->id;
        $involucrado_domicilio->id_pais = $pais;
        if($pais == 118){
            $involucrado_domicilio->codigo_postal = $CP;
            $involucrado_domicilio->calle = $calle;
            $involucrado_domicilio->numero_exterior = $numext;
            $involucrado_domicilio->numero_interior = $numint;
            $involucrado_domicilio->id_asentamiento = $asentamiento_residencia;
        }else{
            $involucrado->otro_domicilio = $domicilio_extranjero;
        }
        $involucrado_domicilio->save();

        // dd($involucrado_domicilio);

         //TESTIGOS
         if(!empty($request->input('arrayTestigos'))) {
            $arrayTestigos = JSON_decode($request->input('arrayTestigos'));
            foreach ($arrayTestigos as $key => $value) {

                    $testigo = new Involucrado();
                    $testigo->nombre = $value->nombreTestigo;
                    $testigo->primer_apellido = $value->paternoTestigo;
                    $testigo->segundo_apellido = $value->maternoTestigo;
                    $testigo->descripcion_involucrado = $value->adicionalTestigo;
                    $testigo->id_tipo_involucrado = 5;
                    $testigo->id_tipo_persona = 1;
                    $testigo->id_denuncia = $denuncia->id;
                    $testigo->save();

            }
        }
        //GUARDADO DE EVIDENCIAS

        // $ruta = "DenunciaEnLinea/$folio/";
        if($request->hasfile('image')){
            $fileImage = $request->file('image');
            $extension = $fileImage->getClientOriginalExtension();
            $name = "imagen.".$extension;
            $ruta = Storage::disk('buffalo')->putFileAs($rutaGuardado, $fileImage, $name);
            $Evidencia = new Evidencia();
            $Evidencia->id_tipo_evidencia = 1;
            $Evidencia->url = $ruta;
            $Evidencia->id_denuncia = $denuncia->id;
            $Evidencia->save();


        }
        if($request->hasfile('video')){
            // try{
                // $file = $request->file('video');
                // $name = $file->getClientOriginalName();
                // $file->move(public_path().'/Predenuncias/'.$IdExp, $name);
                // $ruta = '/Predenuncias/'.$IdExp.'/'.$name;
                // $Evidencia = new Evidencias();
                // $Evidencia->Ruta = $ruta;
                // $Evidencia->IdExpediente = $IdExp;
                // $Evidencia->save();



                $fileVideo = $request->file('video');
                $extension = $fileVideo->getClientOriginalExtension();
                $name = "video.".$extension;
                $ruta = Storage::disk('buffalo')->putFileAs($rutaGuardado, $fileVideo, $name);

                $Evidencia = new Evidencia();
                $Evidencia->id_tipo_evidencia = 3;
                $Evidencia->url = $ruta;
                $Evidencia->id_denuncia = $denuncia->id;
                $Evidencia->save();

            // }catch(\Exception $e){
            //     $debug = new Debug();
            //     $debug->controlador = 'DenunciaDigitalController';
            //     $debug->funcion = 'store->video';
            //     $debug->log = $e->getMessage();
            // }
        }
        if($request->hasfile('audio')){
            // try{
                // $file = $request->file('audio');
                // $name = $file->getClientOriginalName();
                // $file->move(public_path().'/Predenuncias/'.$IdExp, $name);
                // $ruta = '/Predenuncias/'.$IdExp.'/'.$name;
                // $Evidencia = new Evidencias();
                // $Evidencia->Ruta = $ruta;
                // $Evidencia->IdExpediente = $IdExp;
                // $Evidencia->save();

                $fileaudio = $request->file('audio');
                $extension = $fileaudio->getClientOriginalExtension();
                $name = "audio.".$extension;
                $ruta = Storage::disk('buffalo')->putFileAs($rutaGuardado, $fileaudio, $name);

                $Evidencia = new Evidencia();
                $Evidencia->id_tipo_evidencia = 2;
                $Evidencia->url = $ruta;
                $Evidencia->id_denuncia = $denuncia->id;
                $Evidencia->save();
                // dd($Evidencia);
            // }catch(\Exception $e){
            //     $debug = new Debug();
            //     $debug->controlador = 'DenunciaDigitalController';
            //     $debug->funcion = 'store->audio';
            //     $debug->log = $e->getMessage();
            // }
        }
        if($request->hasfile('documento')){
            // try{
                // $file = $request->file('documento');
                // $name = $file->getClientOriginalName();
                // $file->move(public_path().'/Predenuncias/'.$IdExp, $name);
                // $ruta = '/Predenuncias/'.$IdExp.'/'.$name;
                // $Evidencia = new Evidencias();
                // $Evidencia->Ruta = $ruta;
                // $Evidencia->IdExpediente = $IdExp;
                // $Evidencia->save();


                $filedocumento = $request->file('documento');
                $extension = $filedocumento->getClientOriginalExtension();
                $name = "documento.".$extension;
                $ruta = Storage::disk('buffalo')->putFileAs($rutaGuardado, $filedocumento, $name);

                $Evidencia = new Evidencia();
                $Evidencia->id_tipo_evidencia = 4;
                $Evidencia->url = $ruta;
                $Evidencia->id_denuncia = $denuncia->id;
                $Evidencia->save();

            // }catch(\Exception $e){
            //     $debug = new Debug();
            //     $debug->controlador = 'DenunciaDigitalController';
            //     $debug->funcion = 'store->document';
            //     $debug->log = $e->getMessage();
            // }
        }


        $hechos = new Hecho;
        $hechos->id_denuncia = $denuncia->id;

        if($carretera == 1){
            $hechos->es_tramo_carretero = 1;
            $hechos->km_carretero = $km_hechos;
            $hechos->descripcion_lugar = $descripcion_lugar;
        }else{
            $hechos->es_tramo_carretero = 0;
            $hechos->calle = $calle_hechos;
            $hechos->codigo_postal = $CP_hechos;
            $hechos->numero_exterior = $numero_hechos;
            $hechos->id_asentamiento = $asentamiento_hechos;
            // $hechos->latitud = $latitud;
            // $hechos->longitud = $longitud;
            // $hechos->domicilio_mapa = $domicilio_mapa;
        }

        $hechos->fecha_inicial = Carbon::parse($fecha_inicial . ' ' . $hora_inicial);
        if($fechaintervalo == 2){
            $hechos->fecha_final = Carbon::parse($fecha_final . ' ' . $hora_final);
        }
        $hechos->narrativa = $narrativa;
        $hechos->save();
        // dd($hechos);


        // $token =Str::random(20);
        // $denuncia = 1112;
        // $folio = "PD/xxx55";
        $rutaAcuse = $this->generarPDF($id_denuncia);

        $mensajeNotificacion = 'El registro de su Denuncia se realizó de forma correcta, asignándole el folio '.$folio.' y la clave de seguimiento '.$token.', Su denuncia en línea será analizada por el Agente de Ministerio Público Orientador Digital, quien la asignará a la Fiscalía correspondiente para su seguimiento, atención y comunicación con usted. Esté al pendiente del correo/teléfono proporcionado.';
        $info = new \stdClass;
        $info->nombre = $nombre.' '.$PrimerApellido.' '.$SegundoApellido;
        $info->folio = $folio;
        $info->email = $correo;
        $info->asunto = 'Denuncia en Línea FGE';
        $info->token = $token;
        $info->mensaje = $mensajeNotificacion;
        //$info->sede1 = $sede1;
        //$info->sede2 = $sede2;

        setlocale(LC_TIME, 'spanish');
        $fecha = Carbon::now();
        $fecha = strftime("%A, %d de %B del %Y", strtotime($fecha));
        $info->fecha = $fecha;
		Mail::to($correo)->
		send(new RegistroDenunciaMailable($info,$rutaAcuse));
        unlink($rutaAcuse);

        $array = ["respuesta"=> true ,"token"=> $token, "denuncia" => Crypt::encrypt($denuncia->id) ,  "data"=>$denuncia, "folio" => $folio ];
        // $mensajeWhatsapp = "Denuncia en línea registrada '\n' con éxito, con el siguiente folio: $folio y clave de seguimiento: $token";
        $this->sendWhatsapp($mensajeNotificacion,$telefono);

        $notificacion = new NotificacionUsuario;
        $notificacion->nombre_involucrado = $nombre." ".$PrimerApellido." ".$SegundoApellido;
        $notificacion->correo_electronico = $correo;
        $notificacion->telefono = $telefono;
        $notificacion->id_modulo = 1;
        $notificacion->llave_modulo = $denuncia->id;
        $notificacion->mensaje = $mensajeNotificacion;
        $notificacion->id_usuario_receptor = $involucrado->id;
        $notificacion->save();

        DB::commit();
        return response()->json($array);

        }catch(\Exception $e){
            DB::rollBack();
            $array = ["respuesta"=> false ,"error"=> "Error al intentar registrar la denuncia: ".$e->getMessage() ];
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('consulta.vista');
    }


    public function consultaDenuncia(Request $request)
    {
        $folio = $request->folio;
        $token = $request->token;

        // dd($folio);

        $expediente = Denuncia::where([['folio_denuncia',$folio],['token_denuncia',$token]])
                        ->get();
                        // dd($expediente);
                        // return $expediente;

        if($expediente->isNotEmpty())
        {
            $expediente = $expediente[0];
            $id_denuncia = $expediente->id;
            // dd($id_denuncia);
            $NumeroCaso = Caso::where("id_denuncia_linea",$id_denuncia)->first();
            $denunciante = Involucrado::where("id_tipo_involucrado","4")->where("id_denuncia",$id_denuncia)->first();
            $hechos = Hecho::where("id_denuncia",$id_denuncia)->first();
            // return $denunciante;

            // $hechos = DB::connection('sqlpredenuncia')->table('HechosDenunciante')
            //                 ->leftjoin('catalogos.dbo.Pais', 'catalogos.dbo.Pais.id','=', 'HechosDenunciante.Pais')
            //                 ->leftjoin('catalogos.dbo.ENTIDAD', 'catalogos.dbo.ENTIDAD.ID','=','HechosDenunciante.Entidad')
            //                 ->leftjoin('catalogos.dbo.MUNICIPIO', 'catalogos.dbo.MUNICIPIO.ID','=','HechosDenunciante.Municipio')
            //                 ->select('Narrativa','FechaExacta','HoraExacta','catalogos.dbo.Pais.desc AS Pais','catalogos.dbo.ENTIDAD.DESCRIPCION AS Entidad','catalogos.dbo.MUNICIPIO.DESCRIPCION AS Municipio','Colonia','Calle','NumeroExt','NumeroInt','CodigoPostal','IdCarretera','KM','DescripcionHecho','TipoFecha')
            //                 ->where('IdExpediente',$expediente[0]->IdExpediente)
            //                 ->get();

            // return $hechos;
            $delito = null;
            if(!empty($expediente->id_delito_clasificacion))
            $delito =  DelitoClasificacion::where("id",$expediente->id_delito_clasificacion);
        // $delito =  DB::connection('sqlpredenuncia')->table('Delitos')
        //                 ->leftJoin('catalogos_new.dbo.DelitosSIGI', 'catalogos_new.dbo.DelitosSIGI.IdDelito','=','Delitos.DelitoId')
        //                 ->select('catalogos_new.dbo.DelitosSIGI.cNombre as Delito','IdExpediente','IdModalidad')
        //                 ->where([['IdExpediente',$expediente[0]->IdExpediente],['EstadoDelito',1]])
        //                 ->get();

        // return $delito;

        $delito_aux="";
        // if($delito[0]->Delito == '')
        // {
            //     $delito_aux =  DB::connection('sqlpredenuncia')->table('catalogos.dbo.UnidadRegion')
            //                 ->leftJoin('catalogos.dbo.DelitosPredenuncia', 'catalogos.dbo.DelitosPredenuncia.Id','=','catalogos.dbo.UnidadRegion.IdDelito')
            //                 ->leftJoin('catalogos.dbo.DelitoRoboPredenuncia', 'catalogos.dbo.DelitoRoboPredenuncia.Id','=','catalogos.dbo.UnidadRegion.IdTipoRobo')
            //                 ->select('catalogos.dbo.DelitosPredenuncia.Descripcion as Delito','catalogos.dbo.DelitoRoboPredenuncia.Descripcion as TipoRobo')
            //                 ->where('catalogos.dbo.UnidadRegion.IdUnidadRegion',$delito[0]->IdUnidadRegion)
            //                 ->get();
            // }
            $evidencias = Evidencia::where("id_denuncia",$id_denuncia)->get();
            // $evidencias = DB::connection('sqlpredenuncia')->table('EvidenciasPredenuncia')
            //                 ->select('ruta')
            //                 ->where('IdExpediente',$expediente[0]->IdExpediente)
            //                 ->get();

            // return $evidencias;

            // $id_denuncia = 88;
            $testigos =  Involucrado::where("id_tipo_involucrado",5)->where("id_denuncia",$id_denuncia)->get();
            // dd($testigos);
            // $testigos =  DB::connection('sqlpredenuncia')->table('Testigos')
            //                 ->select('Nombre','PrimerApellido','SegundoApellido','InformacionAdicional')
            //                 ->where('IdExpediente',$expediente[0]->IdExpediente)
            //                 ->get();

                            // return $testigos;

            // $notificaciones = NotificacionUsuario::where("id_denuncia_linea")->get();
            $notificaciones = NotificacionUsuario::where("llave_modulo",$id_denuncia)->where("id_modulo",1)->whereNull("id_usuario_emisor")->get();

            // $notificaciones = DB::connection('sqlpredenuncia')->table('Notificaciones')
            //                 ->select('FechaCita','Hora','TipoNotificacion','Asunto','Descripcion','created_at')
            //                 ->where('IdExpediente',$expediente[0]->IdExpediente)
            //                 ->orderby('created_at','DESC')
            //                 ->get();

                            // return $notificaciones;

            return view('consulta.datos',compact('NumeroCaso','denunciante','hechos','delito','evidencias','testigos','notificaciones','delito_aux'));
        }
        else
        {

            return redirect()->back()->with('fail','No es posible localizar la denuncia, favor de revisar los datos.');
        }
    }


    public function consultaD(Request $request)
    {
        $folio = $request->folio;
        $token = $request->token;

        // dd($folio);

        $expediente = Denuncia::where([['folio_denuncia',$folio],['token_denuncia',$token]])
                        ->get();
                        // dd($expediente);
                        // return $expediente;

        if($expediente->isNotEmpty())
        {
            $expediente = $expediente[0];
            $id_denuncia = $expediente->id;
            // dd($id_denuncia);
            $NumeroCaso = Caso::where("id_denuncia_linea",$id_denuncia)->first();
            $denunciante = Involucrado::where("id_tipo_involucrado","4")->where("id_denuncia",$id_denuncia)->first();
            $hechos = Hecho::where("id_denuncia",$id_denuncia)->first();
            // return $denunciante;

            // $hechos = DB::connection('sqlpredenuncia')->table('HechosDenunciante')
            //                 ->leftjoin('catalogos.dbo.Pais', 'catalogos.dbo.Pais.id','=', 'HechosDenunciante.Pais')
            //                 ->leftjoin('catalogos.dbo.ENTIDAD', 'catalogos.dbo.ENTIDAD.ID','=','HechosDenunciante.Entidad')
            //                 ->leftjoin('catalogos.dbo.MUNICIPIO', 'catalogos.dbo.MUNICIPIO.ID','=','HechosDenunciante.Municipio')
            //                 ->select('Narrativa','FechaExacta','HoraExacta','catalogos.dbo.Pais.desc AS Pais','catalogos.dbo.ENTIDAD.DESCRIPCION AS Entidad','catalogos.dbo.MUNICIPIO.DESCRIPCION AS Municipio','Colonia','Calle','NumeroExt','NumeroInt','CodigoPostal','IdCarretera','KM','DescripcionHecho','TipoFecha')
            //                 ->where('IdExpediente',$expediente[0]->IdExpediente)
            //                 ->get();

            // return $hechos;
            $delito = null;
            if(!empty($expediente->id_delito_clasificacion))
            $delito =  DelitoClasificacion::where("id",$expediente->id_delito_clasificacion);
        // $delito =  DB::connection('sqlpredenuncia')->table('Delitos')
        //                 ->leftJoin('catalogos_new.dbo.DelitosSIGI', 'catalogos_new.dbo.DelitosSIGI.IdDelito','=','Delitos.DelitoId')
        //                 ->select('catalogos_new.dbo.DelitosSIGI.cNombre as Delito','IdExpediente','IdModalidad')
        //                 ->where([['IdExpediente',$expediente[0]->IdExpediente],['EstadoDelito',1]])
        //                 ->get();

        // return $delito;

        $delito_aux="";
        // if($delito[0]->Delito == '')
        // {
            //     $delito_aux =  DB::connection('sqlpredenuncia')->table('catalogos.dbo.UnidadRegion')
            //                 ->leftJoin('catalogos.dbo.DelitosPredenuncia', 'catalogos.dbo.DelitosPredenuncia.Id','=','catalogos.dbo.UnidadRegion.IdDelito')
            //                 ->leftJoin('catalogos.dbo.DelitoRoboPredenuncia', 'catalogos.dbo.DelitoRoboPredenuncia.Id','=','catalogos.dbo.UnidadRegion.IdTipoRobo')
            //                 ->select('catalogos.dbo.DelitosPredenuncia.Descripcion as Delito','catalogos.dbo.DelitoRoboPredenuncia.Descripcion as TipoRobo')
            //                 ->where('catalogos.dbo.UnidadRegion.IdUnidadRegion',$delito[0]->IdUnidadRegion)
            //                 ->get();
            // }
            $evidencias = Evidencia::where("id_denuncia",$id_denuncia)->get();
            // $evidencias = DB::connection('sqlpredenuncia')->table('EvidenciasPredenuncia')
            //                 ->select('ruta')
            //                 ->where('IdExpediente',$expediente[0]->IdExpediente)
            //                 ->get();

            // return $evidencias;

            // $id_denuncia = 88;
            $testigos =  Involucrado::where("id_tipo_involucrado",5)->where("id_denuncia",$id_denuncia)->get();
            // dd($testigos);
            // $testigos =  DB::connection('sqlpredenuncia')->table('Testigos')
            //                 ->select('Nombre','PrimerApellido','SegundoApellido','InformacionAdicional')
            //                 ->where('IdExpediente',$expediente[0]->IdExpediente)
            //                 ->get();

                            // return $testigos;

            $notificaciones = NotificacionUsuario::where("llave_modulo",$id_denuncia)->where("id_modulo",1)->whereNull("id_usuario_emisor")->get();
            // $notificaciones = DB::connection('sqlpredenuncia')->table('Notificaciones')
            //                 ->select('FechaCita','Hora','TipoNotificacion','Asunto','Descripcion','created_at')
            //                 ->where('IdExpediente',$expediente[0]->IdExpediente)
            //                 ->orderby('created_at','DESC')
            //                 ->get();

                            // return $notificaciones;

            return view('consulta.datos',compact('NumeroCaso','denunciante','hechos','delito','evidencias','testigos','notificaciones','delito_aux'));
        }
        else
        {

            return redirect()->back()->with('fail','No es posible localizar la denuncia, favor de revisar los datos.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getMunicipios(Request $request, $estado){
        if($request->ajax()){
          $municipios = CatMunicipality::municipios($estado);
          return response()->json($municipios);
        }
    }


}
