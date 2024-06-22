
<style>
    .card-bodys {
        background-image: url('{{asset("img/denuncia/Tarjeta Registro Exitoso.png")}}');
        background-size: cover;
    }

    .txt-conclusion {
        font: var(--unnamed-font-style-normal) normal var(--unnamed-font-weight-normal) var(--unnamed-font-size-60)/var(--unnamed-line-spacing-69) var(--unnamed-font-family-labrador-a);
        letter-spacing: var(--unnamed-character-spacing-0);
        color: var(--unnamed-color-707070);
        text-align: center;
        font: normal normal normal 40px/69px Labrador A;
        letter-spacing: 0px;
        color: #707070;
        width: 100%;
    }

    .txt-dato {
        /* UI Properties */
        font: var(--unnamed-font-style-normal) normal var(--unnamed-font-weight-bold) var(--unnamed-font-size-60)/var(--unnamed-line-spacing-69) var(--unnamed-font-family-labrador-a);
        letter-spacing: var(--unnamed-character-spacing-0);
        color: var(--unnamed-color-77bcc0);
        text-align: center;
        font: normal normal bold 50px/69px Labrador A;
        letter-spacing: 0px;
        color: #77BCC0;
        width: 100%;
    }
</style>
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card  bg-light border-dark mt-5">
                <img class="card-img" src="{{asset("img/denuncia/Tarjeta Registro Exitoso.png")}}"
                    alt="Card image cap">
         

                <div class="card-img-overlay text-center" style=" 
                    font: var(--unnamed-font-style-normal) normal var(--unnamed-font-weight-900) var(--unnamed-font-size-90)/var(--unnamed-line-spacing-103) var(--unnamed-font-family-labrador-a);
                    letter-spacing: var(--unnamed-character-spacing-0);
                    color: var(--unnamed-color-cf8e1d);
                    text-align: left;
                    font: normal normal 900 60px/103px Labrador A;
                    letter-spacing: 0px;
                    color: #CF8E1D;
                    opacity: 1;
                    top: 175px;
                    width: 100%;">
                    ¡REGISTRO EXITOSO!
                </div>
                <div class="card-img-overlay  text-center txt-conclusion" style="    top: 250px;">
                    Su denuncia se registró con el
                </div>

                <div class="card-img-overlay text-center txt-conclusion" style="    top: 285px;">
                    Folio único:
                </div>


                <div class="card-img-overlay  text-center txt-dato" style="    top: 330px;">
                    {{$folio}}
                </div>

                <div class="card-img-overlay  text-center txt-conclusion" style="    top: 380px;">
                    Clave de seguimiento:
                </div>

                <div class="card-img-overlay  text-center txt-dato" style="    top: 425px;">
                    {{$token}}
                </div>

           
            </div>



        </div>
    </div>
</div>





<script>
    $( document ).ready(function() {
        var tamano_pantalla = screen.width
       if(tamano_pantalla >=768){
           $("#escritorio").css("display","block");
           $("#movil").css("display","none");
       }else{
           $("#escritorio").css("display","none");
           $("#movil").css("display","block");
       }
    });
</script>
