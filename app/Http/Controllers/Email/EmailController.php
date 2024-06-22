<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\Mail\RegistroDenunciaMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    function notificacionDenuncia($info)
    {
      $email = 'pruebasfge@outlook.com';

     \MultiMail::to($info->email)
      ->from('pruebasfge@outlook.com')
      // ->cc($info->email)
      ->send(new RegistroDenunciaMailable($info));
      return true;
    }
}
