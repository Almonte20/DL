<?php

namespace App\Traits;

use App\Mail\CodigoVerificacionMailable;
use Illuminate\Support\Facades\Mail;

trait NotificationTrait
{
    public function sendNotificationWhatsapp($number_phone, $message)
    {
        $data = array(
            "recipients" => "52$number_phone",
            "template_id" => "ab9c3c57-4828-46dd-ad87-0277f155fc73",
            "contact_type" => "phone",
            "body_vars" => array(
                array(
                    "text" => "{{1}}",
                    "val" => $message,
                ),
            ),
        );

        $curl = curl_init();

        curl_setopt_array(
            $curl,
            array(
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
                    'Content-Type: application/json',
                ),
            )
        );

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    public function sendNotificationMail($email, $data)
    {
        Mail::to(trim($email))->send(new CodigoVerificacionMailable($data));
    }
}
