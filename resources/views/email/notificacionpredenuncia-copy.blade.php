<style media="screen">
.justificar_texto {
text-align: justify;
text-justify: inter-word;
padding-left: 50px;
padding-right: 50px;
}
</style>
<html>
  <head>
    <style>

    </style>
  </head>
  <body class="image" style="background-color:#F4F4F4;" align="center">
    </br></br>
      <table width="750px" cellpadding="0" cellspacing="0" >
        <tr>
          <td width="100%" style="height: 1200px ; width: 100%; color:#58585A; background: url( {{ asset('http://www.declara.fiscaliamichoacan.gob.mx/img/mail/correo_vertical.png') }} )">
            <div style="width:100%;height:200px; top: 0;">
                <h2 style="font-family:Arial;font-size:25px;line-height:35px; text-align: center; margin-left: 20px; margin-right: 20px;">
                  Fiscalía General del Estado de Michoacán
                  <br>
                  <br>
                  <p>Notificación de Predenuncia</p>
                </h2>
                <br>
                <br>
                <div align="right" style="font-family:Arial; font-size: 15px; margin-right: 30px;">{{ $data->fecha }}</div>
            </div>
            <br><br>
            <div style="width:100%;height:200px;">
              <center style="font-family:Arial; font-size: 15px;">
                <h2 class="justificar_texto"><strong>Asunto: {{ $data->asunto }}</strong></h2>
                <p class="justificar_texto">{{ $data->mensaje }}</p>
                <br>
                <br>
                <p>Atentamente: <strong>{{ $data->nombre }}</strong><br>[ {{ $data->email }} ] </p>
              </center>
            </div>
          </td>
        </tr>
      </table>
      <!--<img src="{{ $message->embed('img/background_mail_vertical.png') }}"> -->
    </br></br></br>
  </body>
</html>
