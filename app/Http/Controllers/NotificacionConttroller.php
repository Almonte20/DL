<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\NotificationTrait;

class NotificacionConttroller extends Controller
{
    use NotificationTrait;

    public function enviarCodigoVerificacion(Request $request) {
        $message = "que el código de verificación para continuar el registro de Denuncia en Línea es: $request->codigo";

        $this->sendNotificationWhatsapp($request->whatsapp, $message);
        $this->sendNotificationMail($request->correo, ['codigo_verificacion' => $request->codigo]);

        return response()->json(['mensaje' => 'Datos enviados correctamente']);
    }
}
