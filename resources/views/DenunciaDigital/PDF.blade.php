<?php
define('FPDF_FONTPATH','lib/fpdf181/font/');
use pwf\Expedientes;
use pwf\firmas_digitales;
use pwf\generales_usuario;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

require('lib/fpdf181/mc_table.php');

 $folio = $_GET['folio']; 
// dd($folio);

//busca el id del usuario
$id_usuario = Expedientes::where('ExpedientePredenuncia', '=', $folio)->first();

//asignamos el IdExpediente
$IdExpediente = $id_usuario->LlavePredenuncia;

//busca si existe alguna llave en hellman
$Datos_Hellman = firmas_digitales::where('Folio', '=', $folio)->first();

IF($Datos_Hellman != ''){
    $firma_predenuncia = $Datos_Hellman->Llave;
}ELSE{
 // se genera la llave
$llave = Str::random(256);

// se genera la firma
$firma_predenuncia = Crypt::encryptString($llave);

// Se guardan los datos
$Hellman = new firmas_digitales();
$Hellman->Llave = $firma_predenuncia;
$Hellman->Folio = $folio;
$Hellman->save();

}
function Generaqr($firma_predenuncia,$IdExpediente){

    QrCode::format('png')->merge('img/PDF_Predenuncia/fge.png', 0.2, true)->size(500)->margin(0)->generate($firma_predenuncia, public_path('acuse/'.$IdExpediente.'.png'));
}

// Se genera el QR
Generaqr($firma_predenuncia,$IdExpediente);

// busca datos generales del usuario
$datos_usuario = generales_usuario::where('id', '=', $id_usuario->UsuarioExterno)->first();




class PDF_AutoPrint extends PDF_MC_Table
{
    function AutoPrint($dialog=false)
    {
        //Open the print dialog or start printing immediately on the standard printer
        $param=($dialog ? 'true' : 'false');
        $script="print($param);";
        $this->IncludeJS($script);
    }

    function AutoPrintToPrinter($server, $printer, $dialog=false)
    {
        //Print on a shared printer (requires at least Acrobat 6)
        $script = "var pp = getPrintParams();";
        if($dialog)
            $script .= "pp.interactive = pp.constants.interactionLevel.full;";
        else
            $script .= "pp.interactive = pp.constants.interactionLevel.automatic;";
        $script .= "pp.printerName = '\\\\\\\\".$server."\\\\".$printer."';";
        $script .= "print(pp);";
        $this->IncludeJS($script);
    }
}


$pdf = new PDF_AutoPrint();
$pdf->AddFont('LabradorA-Black');
$pdf->AddFont('LabradorA-Italic');
$pdf->AddFont('LabradorA-ExtraBold');

$pdf->SetAutoPageBreak(true,1);


$pdf->AddPage('Portrait','letter');
$pdf->Image('img/PDF_Predenuncia/formato_predenuncia2.png',0,0,280,216);
//$pdf->Image('img/PDF_Predenuncia/logo_predenuncia.png',8,10,80,22);
$pdf->Image('img/1.png',225,144,50,50);

//Folio
$pdf->SetXY(159,18);
$pdf->SetFont('LabradorA-ExtraBold','',25);
$pdf->SetTextColor(241, 25, 25);
$pdf->Cell(92,5,$folio,0,0,'L');

//Nombre
$pdf->SetXY(13,65);
$pdf->SetFont('LabradorA-ExtraBold','',14);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(92,5,utf8_decode($datos_usuario->name),0,0,'L');

//Paterno
$pdf->SetXY(13,90);
$pdf->SetFont('LabradorA-ExtraBold','',14);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(92,5,utf8_decode($datos_usuario->PrimerApellido),0,0,'L');

//Materno
IF($datos_usuario->SegundoApellido != ''){
    $Materno = $datos_usuario->SegundoApellido;
}else{
    $Materno = '-';
}

$pdf->SetXY(13,114);
$pdf->SetFont('LabradorA-ExtraBold','',14);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(92,5,utf8_decode($Materno),0,0,'L');

//CURP
$pdf->SetXY(13,138);
$pdf->SetFont('LabradorA-ExtraBold','',14);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(92,5,$datos_usuario->CURP,0,0,'L');

//Calle
 IF($datos_usuario->Pais != '165'){
    $Calle = $datos_usuario->DomicilioExtranjero;
    $Colonia = '-';
    $NumExt = '-';
    $CP = '-';
 }else{
    $Calle =  $datos_usuario->Calle;
    $Colonia = $datos_usuario->Colonia;
    $NumExt = $datos_usuario->NumExt;
    $CP = $datos_usuario->CodigoPostal;
 }

$pdf->SetXY(115,65);
$pdf->SetFont('LabradorA-ExtraBold','',14);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(92,5,utf8_decode($Calle),0,0,'L');

//Colonia
$pdf->SetXY(115,90);
$pdf->SetFont('LabradorA-ExtraBold','',14);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(92,5,utf8_decode($Colonia),0,0,'L');

//Numero Ext
$pdf->SetXY(115,114);
$pdf->SetFont('LabradorA-ExtraBold','',14);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(92,5,$NumExt,0,0,'L');

//CP
$pdf->SetXY(115,138);
$pdf->SetFont('LabradorA-ExtraBold','',14);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(92,5,$CP,0,0,'L');

//Firma
$pdf->SetXY(13,158);
$pdf->SetFont('LabradorA-Black','',12);
$pdf->SetTextColor(0, 0, 0);
$pdf->MultiCell(195,4,$firma_predenuncia,0);

echo chunk_split(base64_encode($pdf->Output('F', public_path('acuse/'.$IdExpediente.'.pdf'))));

// echo chunk_split(base64_encode($pdf->Output('D',  $folio.'.pdf')));

?>
