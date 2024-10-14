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

     protected $fpdf_acuse;
     protected $fpdf_denuncia;

     public function __construct()
    {

        $this->fpdf_acuse = new Fpdf;
        $this->fpdf_denuncia = new Fpdf;
    }

    public function index()
    {
        $countries = CatalogsCatCountries::all();
        $estados = CatState::all();
        $municipios = CatMunicipality::all();
        $lugares = CatPlaces::all();
        // dd($paises);

        return view('denuncia2',compact('countries','estados','lugares'));
        // return view('denuncia',compact('countries','estados','lugares'));
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

    public function generarPreSigi($id_denuncia)
    {

        date_default_timezone_set('America/Mexico_City');
        $denuncia = Denuncia::where('id', $id_denuncia)->first();
        $hechos = Hecho::where('id_denuncia', $id_denuncia)->first();
        $NumeroCaso = Caso::where("id_denuncia_linea",$id_denuncia)->first();
        
        $folio = $denuncia->folio_denuncia;
        $pdf = $this->fpdf_denuncia;
        $pdf->AddPage('P', 'letter');
        // $pdf->AddFont('LabradorA-Black');
        $pdf->SetAutoPageBreak(true,1);

        $pdf->AddFont('LabradorA-Black');
        $pdf->AddFont('LabradorA-Italic');
        $pdf->AddFont('LabradorA-ExtraBold');

        $pdf->SetFont('Arial','B',10);
        
        $pdf->Image('img\denuncia\Titulo_fisca.jpg',10,10,180);
        
        $pdf->SetXY(110,45);
        $pdf->Rect(110,45 ,50 ,14 );
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(50,14,utf8_decode("Número Único de caso:"),0,0,'C');
        $pdf->Rect(160,45,46,14 );
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(0,14,utf8_decode(!empty($NumeroCaso) ? $NumeroCaso->caso : 'Sin asignar'),0,0,'C');
        
        
        $pdf->SetXY(110,59);
        $pdf->Rect(110,59 ,50 ,14 );
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(50,14,utf8_decode("Número de expediente:"),0,0,'C');
        $pdf->Rect(160,59,46,14 );
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(0,14,$folio,0,0,'C');
        
        
        $pdf->SetFont('Arial','B',10);
        $dia = sprintf("%02d", date('d'));
        $mes = $this->nombreMes(date('n')-1);
        $anio = date("Y");
        $hora = date("H:i");
        
        $pdf->Ln(15);
        $pdf->Cell(0,14,utf8_decode("Morelia, Michoacán a $dia de $mes del $anio"),0,0,'R');
        
        $pdf->Ln(15);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,14,utf8_decode("DENUNCIA"),0,0,'C');
        
        $pdf->SetFont('Arial','B',11);
        $pdf->Ln(15);
        $pdf->MultiCell(0,4.5,utf8_decode("En la Ciudad de Morelia, Michoacán de Ocampo, a las $hora horas , del día $dia, del mes de $mes, del año $anio, dos mil veinticuatro, se presenta ante el/la Lic. GONZALEZ VENEGAS JORGE ALBERTO Agente del Ministerio Público, de la Unidad de Investigación, de conformidad a las facultades que confieren los artículos 21 constitucional; 109, 212, 213, 217, 218, 221, 222 y 223 del Código Nacional de Procedimientos Penales, y de conformidad al apartado C. del artículo 20 constitucional que a la letra establece: De los derechos de la víctima o del ofendido:"),0,'J');
        $pdf->SetFont('Arial','',11);
        $pdf->MultiCell(0,4.5,utf8_decode("I. Recibir asesoría jurídica; ser informado de los derechos que en su favor establece la Constitución y, cuando lo solicite, ser informado del desarrollo del procedimiento penal. II. Coadyuvar con el Ministerio Público; a que se le reciban todos los datos o elementos de prueba con los que cuente, tanto en la investigación como en el proceso a que se desahoguen las diligencias correspondientes, y a intervenir en el juicio e interponer los recursos en los términos que prevea la ley. Cuando el Ministerio Público considere que no es necesario el desahogo de la diligencia, deberá fundar y motivar su negativa. III. Recibir, desde la comisión del delito, atención médica y psicológica de urgencia. IV. Que se le repare el daño. En los casos en que sea procedente, El Ministerio Público estará obligado a solicitar la reparación del daño, sin menoscabo de que la víctima u ofendido lo pueda solicitar directamente, y el juzgador no podrá absolver al sentenciado de dicha reparación si ha emitido una sentencia condenatoria. La ley fijará procedimientos ágiles para ejecutar las sentencias en materia de reparación del daño. V. Al resguardo de su identidad y otros datos personales en los siguientes casos: cuando sean menores de edad; cuando se trate de delitos de violación, trata de personas, secuestro o delincuencia organizada; y cuando a juicio del juzgador sea necesario para su protección, salvaguardando en todo caso los derechos de la defensa. El Ministerio Público deberá garantizar la protección de víctimas, ofendidos, testigos y en general todos los sujetos que intervengan en el proceso. Los jueces deberán vigilar el buen cumplimiento de esta obligación. VI. Solicitar las medidas cautelares y providencias necesarias para la protección y restitución de sus derechos, y VII. Impugnar ante autoridad judicial las omisiones del Ministerio Público en la investigación de los delitos, así como las resoluciones de reserva, no ejercicio, desistimiento de la acción penal o suspensión del procedimiento cuando no está satisfecha la reparación del daño."),0,'J');
        
        $pdf->Ln(3);
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(0,7,utf8_decode("Quien enterado de lo anterior, proporciona la siguiente información: "),0,1,'L');
        $pdf->Ln(3);
        $pdf->Cell(0,7,utf8_decode("1.- GENERALES DEL DENUNCIANTE."),0,1,'L');

        $denunciante = Involucrado::where("id_tipo_involucrado","4")->where("id_denuncia",$id_denuncia)->first();
        if(empty($denunciante)){
            $victima = Involucrado::where("id_tipo_involucrado","1")->where("id_denuncia",$id_denuncia)->first();
            $denunciante = Involucrado::where("id_tipo_involucrado","3")->where("id_denuncia",$id_denuncia)->first();
            $victimaDenunciante = 0;
        }else{
            $victimaDenunciante = 1;
        }
        
        $domicilio_denunciante =  InvolucradoDomicilio::where("id_involucrado",$denunciante->id)->first();

        $pdf->Ln(3);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(20,7,utf8_decode("NOMBRE:"),0,0,'L');
        
        $xNombre = $pdf->GetX();
        $yNombre = $pdf->GetY();
        $pdf->SetFont('Arial','B',11);
        $pdf->MultiCell(100,7,utf8_decode("$denunciante->nombre $denunciante->primer_apellido $denunciante->segundo_apellido"),0,'');
        $yAfterNombre = $pdf->GetY();
        $pdf->SetXY($xNombre+100,$yNombre);
        
        // Convertir a formato DD/MM/AAAA
        $fecha_nacimiento_f = date('d/m/Y', strtotime($denunciante->fecha_nacimiento));
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(48,7,utf8_decode("FECHA DE NACIMIENTO:"),0,0,'L');
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(0,7,utf8_decode("$fecha_nacimiento_f"),0,0,'L');
        
        $pdf->SetY($yAfterNombre);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(33,7,utf8_decode("NACIONALIDAD:"),0,0,'L');
        $pdf->SetFont('Arial','B',11);

        $x = $pdf->GetX();
        $y = $pdf->GetY();
        $pdf->MultiCell(87,7,mb_strtoupper($denunciante->country()->first()->nacionalidad, 'UTF-8'),0,'');
        $yAfter = $pdf->GetY();
        $pdf->SetXY($x+87,$y);
        if($denunciante->id_nacionalidad == 118){
            $pdf->SetFont('Arial','',11);
            $pdf->Cell(15,7,utf8_decode("CURP:"),0,0,'L');
            $pdf->SetFont('Arial','B',11);
            $pdf->Cell(0,7,utf8_decode("$denunciante->curp"),0,0,'L');
        }
        $pdf->SetY($yAfterNombre);
       
        $pdf->AddPage('P', 'letter');

        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(0,7,utf8_decode("2.- DATOS DE LOCALIZACIÓN."),0,1,'L');
        $pdf->Ln(5);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(48,7,utf8_decode("CORREO ELECTRÓNICO:"),0,0,'L');
        $pdf->SetFont('Arial','B',11);
        $x = $pdf->GetX();
        $y = $pdf->GetY();
        $pdf->MultiCell(91,7,utf8_decode("$denunciante->email"),0,'');
        $yAfter = $pdf->GetY();
        $pdf->SetXY($x+91,$y);
        // $pdf->Cell(91,7,utf8_decode("$denunciante->email"),1,0,'L');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(25,7,utf8_decode("TELÉFONO:"),0,0,'L');
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(0,7,utf8_decode("+52 $denunciante->telefono"),0,1,'L');
        $pdf->SetY($yAfter);

        $Colonia = $denunciante->address()->first()->colony()->first()->nombre_asentamiento;
		$Calle = $denunciante->address()->first()->calle;
		$NumExt = $denunciante->address()->first()->numero_exterior;
		if(!empty($denunciante->address()->first()->numero_interior)){
            $NumExt = $NumExt."-".$denunciante->address()->first()->numero_interior;
        }
        // mb_internal_encoding('UTF-8');
		$CodigoPostal = $denunciante->address()->first()->codigo_postal;
		$Entidad = $denunciante->address()->first()->colony()->first()->municipio()->first()->estado()->first()->nombre_estado;
		$Municipio =$denunciante->address()->first()->colony()->first()->municipio()->first()->nombre_municipio;

		$Nacionalidad = null;
		if(!empty($denunciante->id_nacionalidad))
			$Nacionalidad = $denunciante->first()->country()->first()->nacionalidad;

        $pdf->SetFont('Arial','',11);
        
        $pdf->Cell(24,7,utf8_decode("DOMICILIO:"),0,0,'L');
        if($domicilio_denunciante->id_pais == 118){
            $direccion = "$domicilio_denunciante->calle, $NumExt, Col. $Colonia, CP. $CodigoPostal, $Municipio, $Entidad";
        }else{
            $direccion = $denunciante->address()->first()->otro_domicilio;
        }
        $pdf->SetFont('Arial','B',11);

        $pdf->MultiCell(0,7,utf8_decode(mb_strtoupper($direccion,'UTF-8')),0,'');

        if($victimaDenunciante == 0){
            $pdf->Ln(3);
            $pdf->Cell(0,7,utf8_decode("3.- DATOS DE LA VÍCTIMA."),0,1,'L');
            $pdf->Ln(3);
            $pdf->SetFont('Arial','',11);
            $pdf->Cell(20,7,utf8_decode("NOMBRE:"),0,0,'L');
            
            $xNombre = $pdf->GetX();
            $yNombre = $pdf->GetY();
            $pdf->SetFont('Arial','B',11);
            $pdf->MultiCell(100,7,utf8_decode("$victima->nombre $victima->primer_apellido $victima->segundo_apellido"),0,'');
            $yAfterNombre = $pdf->GetY();
            $pdf->SetXY($xNombre+100,$yNombre);
            
            // Convertir a formato DD/MM/AAAA
            $fecha_nacimiento_f = date('d/m/Y', strtotime($victima->fecha_nacimiento));
            $pdf->SetFont('Arial','',11);
            $pdf->Cell(48,7,utf8_decode("FECHA DE NACIMIENTO:"),0,0,'L');
            $pdf->SetFont('Arial','B',11);
            $pdf->Cell(0,7,utf8_decode("$fecha_nacimiento_f"),0,0,'L');
            
            $pdf->SetY($yAfterNombre);
            $pdf->SetFont('Arial','',11);
            $pdf->Cell(33,7,utf8_decode("NACIONALIDAD:"),0,0,'L');
            $pdf->SetFont('Arial','B',11);
    
            $x = $pdf->GetX();
            $y = $pdf->GetY();
            $pdf->MultiCell(87,7,mb_strtoupper($victima->country()->first()->nacionalidad, 'UTF-8'),0,'');
            $yAfter = $pdf->GetY();
            $pdf->SetXY($x+87,$y);
            if($victima->id_nacionalidad == 118){
                $pdf->SetFont('Arial','',11);
                $pdf->Cell(15,7,utf8_decode("CURP:"),0,0,'L');
                $pdf->SetFont('Arial','B',11);
                $pdf->Cell(0,7,utf8_decode("$victima->curp"),0,1,'L');
            }
            $pdf->SetY($yAfterNombre);
        }
        $pdf->Ln(10);
        $pdf->MultiCell(0,5,utf8_decode("Sin más generales que agregar de su persona, con relación a los hechos que denuncia, de conformidad a lo dispuesto por los artículos 109, 131, 221, 222 y 223 del Código Nacional de Procedimientos Penales, el compareciente MANIFIESTA: "),0,'');
        $pdf->Ln(10);
        $pdf->SetFont('Arial','',11);
        $pdf->MultiCell(0,5,utf8_decode("\n  \n $hechos->narrativa  \n  \n"),1,'J');
        
        $pdf->Ln(40);
        $pdf->SetFont('Arial','',11);
        $pdf->Line($pdf->GetX(),$pdf->GetY(),$pdf->GetX()+80,$pdf->GetY());
        $pdf->Cell(80,7,utf8_decode("AGENTE DEL MINISTERIO PÚBLICO"),0,0,'C');
        $pdf->SetX($pdf->GetX()+36);
        $pdf->Line($pdf->GetX(),$pdf->GetY(),$pdf->GetX()+80,$pdf->GetY());
        $pdf->Cell(80,7,utf8_decode("DENUNCIANTE"),0,1,'C');

        $pdf->SetFont('Arial','B',11);
        $pdf->Ln(1);
        $x = $pdf->GetX();
        $y = $pdf->GetY();
        $pdf->MultiCell(80,7,utf8_decode("GONZALEZ VENEGAS JORGE ALBERTO"),0,'C');

        $pdf->SetXY($pdf->GetX()+80+36,$y);
        $pdf->MultiCell(80,7,utf8_decode("$denunciante->nombre $denunciante->primer_apellido $denunciante->segundo_apellido"),0,'C');

        // $pdf->WriteHTML($html);
        // $pdf->Output("");
       
        $rutaArchivo = public_path("acuse/denuncia_$id_denuncia.pdf");
        $pdf->Output('F', $rutaArchivo);
        $rutaGuardado = "DenunciaEnLinea/".$id_denuncia;
        $ruta = Storage::disk('buffalo')->putFileAs($rutaGuardado, $rutaArchivo, "Denuncia.pdf");
        return $rutaArchivo;

    }

    public function nombreMes($mes){
        $meses = array(
            "ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO",
            "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE");
        return $meses[$mes];
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
        
        $victima = Involucrado::where("id_tipo_involucrado","4")->where("id_denuncia",$id_denuncia)->first();
        if(empty($victima)){
            $victima = Involucrado::where("id_tipo_involucrado","3")->where("id_denuncia",$id_denuncia)->first();
        }

        // $pdf = new Fpdf();
        // Resto del código para generar el PDF
        $pdf = $this->fpdf_acuse;
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
        $pdf->Cell(92,5,utf8_decode($victima->nombre),0,0,'L');

        //Paterno
        $pdf->SetXY(13,90);
        $pdf->Cell(92,5,utf8_decode($victima->primer_apellido),0,0,'L');

        //Materno
        if($victima->segundo_apellido != ''){
            $Materno = $victima->segundo_apellido;
        }else{
            $Materno = '-';
        }

        $pdf->SetXY(13,114);
        $pdf->Cell(92,5,utf8_decode($Materno),0,0,'L');


        //CURP
        $pdf->SetXY(13,138);
        $pdf->Cell(92,5,$victima->curp,0,0,'L');
        // dd($victima->address()->first()->colony()->first()->nombre_asentamiento);
        //Calle
        if($victima->address()->first()->id_pais != 118){
            $Calle = $victima->otro_domicilio;
            $Colonia = '-';
            $NumExt = '-';
            $CP = '-';
        }else{
            $Calle =  $victima->address()->first()->calle;
            $Colonia = $victima->address()->first()->colony()->first()->nombre_asentamiento;
            $NumExt = $victima->address()->first()->numero_exterior;
            $CP = $victima->address()->first()->colony()->first()->codigo_postal;
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
        $pdf->Output('F', $rutaArchivo);
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


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        // dd($request);
        // dd($request->hasFile('evidencias'));
        DB::beginTransaction();

        try{


        // dd($request);
        // Concatenate date and time

     

        //*********************** DATOS DE LA DENUNCIA ******************************

        //ARMADO DEL FOLIO

        $consecMax  = Denuncia::where("anio",date("Y"))->max('consecutivo');
        if (is_null($consecMax) || !is_numeric($consecMax)) {
            $consecMax = 0;
        }
        $consecutivo = $consecMax+1;
        $folio =  "PD/".date('Y').$consecutivo;

        $denuncia = new Denuncia;
        $denuncia->folio_denuncia = $folio;
        $denuncia->consecutivo = $consecutivo;
        $denuncia->anio = date('Y');
        $denuncia->id_tipo_denunciante = 1;
        $denuncia->id_estatus = 5;
        $token = Str::random(20);
        $denuncia->token_denuncia = $token;
        $denuncia->save();


        $id_denuncia = $denuncia->id;
        $rutaGuardado = "DenunciaEnLinea/".$id_denuncia;
        //*********************** DATOS DENUNCIANTE ******************************
        
        $denunciante = new Involucrado();
        $denunciante->curp = $request->curp_denunciante;
        $denunciante->nombre = $request->nombre_denunciante;
        $denunciante->primer_apellido = $request->PrimerApellido_denunciante;
        $denunciante->segundo_apellido = $request->SegundoApellido_denunciante;
        $denunciante->fecha_nacimiento = $request->fnacimiento_denunciante;
        $denunciante->id_nacionalidad = $request->nacionalidad_denunciante;
        $denunciante->email = $request->correo;
        $denunciante->telefono = $request->telefono;
        $denunciante->id_tipo_persona = 1;
        $denunciante->id_denuncia =  $id_denuncia;
        if($request->victimadenunciante == 1){
            $denunciante->id_tipo_involucrado = 4;
        }else{
            $denunciante->id_tipo_involucrado = 3;
        }
        
        if($request->hasfile('credencial')){
            $fileImage = $request->file('credencial');
            $extension = $fileImage->getClientOriginalExtension();
            $name = "Identificacion_denunciante.".$extension;
            dd($fileImage);
            $ruta = Storage::disk('buffalo')->putFileAs($rutaGuardado, $fileImage, $name);
            $denunciante->url_identificacion = $ruta;
        }
        
        $denunciante->save();
        
        $denunciante_domicilio = new InvolucradoDomicilio;
        $denunciante_domicilio->id_involucrado = $denunciante->id;
        $denunciante_domicilio->id_pais = $request->pais;
        if($request->pais == 118){
            $denunciante_domicilio->codigo_postal = $request->CP;
            $denunciante_domicilio->calle = $request->calle;
            $denunciante_domicilio->numero_exterior = $request->numext;
            $denunciante_domicilio->numero_interior = $request->numint;
            $denunciante_domicilio->id_asentamiento = $request->asentamiento_residencia;
        }else{
            $denunciante->otro_domicilio = $request->domicilio_extranjero;
        }
        $denunciante_domicilio->save();
        
        
        //*********************** DATOS DE LA VICTIMA ******************************
        
        if($request->victimadenunciante == 0){
            $victima = new Involucrado();
            $victima->nombre = $request->nombre_victima;
            $victima->primer_apellido = $request->PrimerApellido_victima;
            $victima->segundo_apellido = $request->SegundoApellido_victima;
            $victima->fecha_nacimiento = $request->fnacimiento_victima;
            $victima->id_nacionalidad = $request->nacionalidad_victima;
            $victima->id_tipo_persona = 1;
            $victima->id_denuncia =  $id_denuncia;
            $victima->id_tipo_involucrado = 1;

            if($request->hasfile('identificacion_victima') && $request->mayor_edad_victima == 1){
                $fileImage = $request->file('identificacion_victima');
                $extension = $fileImage->getClientOriginalExtension();
                $name = "Identificacion_victima.".$extension;
                $ruta = Storage::disk('buffalo')->putFileAs($rutaGuardado, $fileImage, $name);
                $victima->url_identificacion = $ruta;
            }
            
            if($request->nacionalidad_victima == 118){
                $victima->curp = $request->curp_victima;
            }

            $victima->save();
        }
        
        //*********************** DATOS DEL RESPONSABLE ******************************
        
        if($request->conoce_responsable == 1 || $request->conoce_rasgos_responsable == 1){
            $responsable = new Involucrado();
            if($request->conoce_responsable == 1){
                $responsable->nombre = $request->nombre_alias_responsable;
            }else{
                $responsable->nombre = "Desconocido";
            }
            $responsable->id_tipo_persona = 1;
            $responsable->id_denuncia =  $id_denuncia;
            $responsable->id_tipo_involucrado = 2;

            if($request->conoce_rasgos_responsable == 1){
                $responsable->descripcion_involucrado = $request->rasgos_fisicos_responsable;
            }
            
            $responsable->save();
            
            if($request->conoce_direccion_responsable == 1 && $request->conoce_rasgos_responsable == 1){
                $responsable_domicilio = new InvolucradoDomicilio;
                $responsable_domicilio->otro_domicilio = $request->direccionResponsable;
                $responsable_domicilio->id_pais = 0;
                $responsable_domicilio->id_involucrado = $responsable->id;
                $responsable_domicilio->save();
            }
            
            
        }
        // dd($denunciante_domicilio->id);
        
        //***************************  HECHOS  ********************************************
        
        
        $hechos = new Hecho;
        $hechos->id_denuncia = $denuncia->id;
        $hechos->domicilio_mapa = $request->domicilio_mapa;
        $hechos->latitud = $request->latitud;
        $hechos->longitud = $request->longitud;
        $hechos->calle = $request->calle_hechos;
        $hechos->codigo_postal = $request->CP_hechos;
        $hechos->numero_exterior = $request->numext_hechos;
        $hechos->numero_interior = $request->numint_hechos;
        $hechos->id_asentamiento = $request->asentamiento_hechos;
        $fecha_inicial = Carbon::parse($request->fecha_inicial)->format('Y-m-d H:i:s');
        $hechos->fecha_inicial = $fecha_inicial;
        
        if($request->fecha_especifica_lapso == 1){
            $fecha_final = Carbon::parse($request->fecha_final)->format('Y-m-d H:i:s');
            $hechos->fecha_final =$fecha_final;
        }
        
        $hechos->suceso = $request->suceso;
        $hechos->narrativa = $request->narrativa;
        $hechos->id_lugar = $request->lugar_descripcion;
        $hechos->referencia_lugar = $request->referencia_lugar;
        $hechos->existio_evidencia = $request->existio_violencia;
        if( $request->existio_violencia == 1){
            $hechos->descripcion_violencia = $request->descripcion_violencia;
        }
        $hechos->save();
        
        // dd($total_evidencias);
        
        //***************************** TESTIGOS *********************************
        
        $arrayTestigos = $request->arrayTestigos;

         if(!empty($request->input('arrayTestigos')) && $request->existen_testigos == 1) {
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
            
            
            //***************************** EVIDENCIAS *********************************

        // $ruta = "DenunciaEnLinea/$folio/";
        if(!$request->hasFile('evidencias') || $request->existen_evidencias == 0){
            $total_evidencias = 0;
        }else{
            $total_evidencias = count($request->file('evidencias'));
        }

        if($total_evidencias > 0){
            for ($i=0; $i < $total_evidencias; $i++) {
                $fileImage = $request->file('evidencias')[$i];
                $extension = $fileImage->getClientOriginalExtension();
                $numeroEvidencia = $i+1;
                $name = "Evidencia_$numeroEvidencia.".$extension;
                $ruta = Storage::disk('buffalo')->putFileAs($rutaGuardado, $fileImage, $name);
                $Evidencia = new Evidencia();
                $Evidencia->id_tipo_evidencia = 1;
                $Evidencia->url = $ruta;
                $Evidencia->id_denuncia = $denuncia->id;
                $Evidencia->save();
            }
        }
        //*************************************** GENERACIÓN DE ACUSE */
        $rutaAcuse = $this->generarPDF($id_denuncia);
        $rutaDenuncia = $this->generarPreSigi($id_denuncia);
        // dd($rutaDenuncia);
        // ************************************** NOTIFICACIONES */
        $nombre = $request->nombre_denunciante;
        $PrimerApellido = $request->PrimerApellido_denunciante;
        $SegundoApellido = $request->SegundoApellido_denunciante;
        $correo = $request->correo;
        $telefono = $request->telefono;
        $mensajeNotificacion = 'El registro de su Denuncia se realizó de forma correcta, asignándole el folio '.$folio.' y la clave de seguimiento '.$token.', Su denuncia en línea será analizada por el Agente de Ministerio Público Orientador Digital, quien la asignará a la Fiscalía correspondiente para su seguimiento, atención y comunicación con usted. Esté al pendiente del correo/teléfono proporcionado.';
        $info = new \stdClass;
        $info->nombre = $request->nombre.' '.$PrimerApellido.' '.$SegundoApellido;
        $info->folio = $folio;
        $info->email = $correo;
        $info->asunto = 'Denuncia en Línea FGE';
        $info->token = $token;
        $info->mensaje = $mensajeNotificacion;
        
        setlocale(LC_TIME, 'spanish');
        $fecha = Carbon::now();
        $fecha = strftime("%A, %d de %B del %Y", strtotime($fecha));
        $info->fecha = $fecha;
		Mail::to($correo)->
		send(new RegistroDenunciaMailable($info,$rutaAcuse,$rutaDenuncia));
        unlink($rutaAcuse);
        unlink($rutaDenuncia);

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
        $notificacion->id_usuario_receptor = $denunciante->id;
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

    public function edit(Request $request){
        return view("Modificacion.vista");
    }

    public function editarDenuncia(Request $request)
    {
        $folio = $request->folio;
        $token = $request->token;

        
        $expediente = Denuncia::where([['folio_denuncia',$folio],['token_denuncia',$token]]);

        if($expediente->get()->isNotEmpty())
        {
            $id_denuncia = $expediente->first()->id;
            // dd($id_denuncia);
            $countries = CatalogsCatCountries::all();
            $estados = CatState::all();
            $municipios = CatMunicipality::all();
            $lugares = CatPlaces::all();

            $hechos = Hecho::where('id_denuncia', $id_denuncia)->first();
            $denunciante = Involucrado::where("id_tipo_involucrado","4")->where("id_denuncia",$id_denuncia)->first();
            if(empty($denunciante)){
                $victima = Involucrado::where("id_tipo_involucrado","1")->where("id_denuncia",$id_denuncia)->first();
                $denunciante = Involucrado::where("id_tipo_involucrado","3")->where("id_denuncia",$id_denuncia)->first();
                $victimaDenunciante = 0;
            }else{
                $victimaDenunciante = 1;
            }
            $domicilio_denunciante =  InvolucradoDomicilio::where("id_involucrado",$denunciante->id)->first();
            
            $testigos = Involucrado::where("id_tipo_involucrado","5")->where("id_denuncia",$id_denuncia)->get();
            $responsable = Involucrado::where("id_tipo_involucrado","2")->where("id_denuncia",$id_denuncia)->get();
            $evidencias = Evidencia::where("id_denuncia",$id_denuncia)->get();
      

            return view("modificacion",compact('expediente','countries','estados','municipios','lugares'));
        }else{
            return redirect()->back()->with('fail','No es posible localizar la denuncia, favor de revisar los datos.');
        }

    }


    public function consultaDenuncia(Request $request)
    {
        $folio = $request->folio;
        $token = $request->token;

        
        $expediente = Denuncia::where([['folio_denuncia',$folio],['token_denuncia',$token]])
        ->get();
        // dd($expediente);
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
