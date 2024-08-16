<style media="screen">
    .justificar_texto {
    font-family:Arial;
    text-align: justify;
    text-justify: inter-word;
    padding-left: 50px;
    padding-right: 50px;
    }
    </style>
    <html>
      <head>
      </head>
      <body class="image" style="background-color:#F4F4F4;">
        <table width="600px" cellpadding="0" cellspacing="0">
          <tr>
            <td width="100%" style="height: 950px ; width: 100%; background-color:#F8F7F0;color:#58585A;background:url({{asset('https://www.fiscaliamichoacan.gob.mx/img/DenunciaLinea/FondoCorreo.png')}}); background-size: cover; background-repeat: no-repeat;">
                <div style="width:100%;height:200px; top: 0;">
                    <h2 style="font-family:Arial;font-size:25px;line-height:35px; text-align: center; margin-left: 20px; margin-right: 20px;">
                      Fiscalía General del Estado de Michoacán
                      <br>
                      <br>
                      <p>Notificación Denuncia en Línea</p>
                    </h2>
                    {{-- <div><center>{{ $data->fecha }}</center></div> --}}
                </div>
                <br><br>
                <div style="width:100%;height:200px;">
                  <center style="font-family:Arial; font-size: 12px;">
                    {{-- <h2 class="justificar_texto"><strong>Código de verdificacion para continuar registro de Denuncia en Línea</strong></h2> --}}
                    <p class="justificar_texto" style="font-size: 18px;">
                        El código de verificación para continuar el registro de Denuncia en Línea es: <b>{{ $data['codigo_verificacion'] }}</b>
                    </p>
                    <br>
                    <br>
                    {{-- <p>Atentamente: <strong>{{ $data->nombre }}</strong><br>[ {{ $data->email }} ] </p> --}}
                  </center>
                 </div>
               </td>
             </tr>
          </table>
      </body>
    </html>
