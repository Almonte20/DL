<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\NotificationTrait;

class NotificacionConttroller extends Controller
{
    use NotificationTrait;

    public function enviarNotificacionWhatsapp($correo, $whatsapp) {
        $message = "que se envió una notificación al correo { $correo } para el seguimiento de la Denuncia en Línea.";
        $this->sendNotificationWhatsapp($whatsapp, $message);
        return response()->json(['mensaje' => 'Datos enviados correctamente']);
    }

    public function enviarCodigoVerificacion(Request $request) {
        $this->enviarNotificacionWhatsapp($request->correo, $request->whatsapp);
        $this->sendNotificationMail($request->correo, ['codigo_verificacion' => $request->codigo]);
        return response()->json(['mensaje' => 'Datos enviados correctamente']);
    }
}
