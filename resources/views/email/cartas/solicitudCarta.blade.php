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
            <td width="100%" style="height: 950px ; width: 100%; background-color:#F8F7F0;color:#58585A;background:url({{asset('http://www.declara.fiscaliamichoacan.gob.mx/img/mail/correo_vertical.png')}}); background-size: cover; background-repeat: no-repeat;">
                <div style="width:100%;height:200px; top: 0;">
                    <h2 style="font-family:Arial;font-size:25px;line-height:35px; text-align: center; margin-left: 20px; margin-right: 20px;">
                      Fiscalía General del Estado de Michoacán
                      <br>
                    </h2>
                    <div><center>{{ $data->fecha }}</center></div>
                </div>
                <br><br>
                <div style="width:100%;height:200px;">
                  <center style="font-family:Arial; font-size: 12px;">
                    <h2 class="justificar_texto"><strong>{{ $data->asunto }}</strong></h2>
                    <p class="justificar_texto">{{ $data->mensaje }}</p>
                    <br>
                  </center>
                 </div>
               </td>
             </tr>
          </table>
      </body>
    </html>
