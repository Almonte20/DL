<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="">
    <style>
        @font-face {
            font-family: "Montserrat";
            src: url('{{ storage_path('fonts/Montserrat-Bold.ttf') }}') format('truetype');
            font-weight: 700;
            font-style: normal;
        }

        @font-face {
            font-family: "Montserrat";
            src: url('{{ storage_path('fonts/Montserrat-Regular.ttf') }}') format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: "Montserrat";
            src: url('{{ storage_path('fonts/Montserrat-Light.ttf') }}') format('truetype');
            font-weight: 100;
            font-style: normal;
        }

        @font-face {
            font-family: "Poppins";
            src: url('{{ storage_path('fonts/Poppins-Bold.ttf') }}') format('truetype');
            font-weight: 700;
            font-style: normal;
        }

        @font-face {
            font-family: "Poppins";
            src: url('{{ storage_path('fonts/Poppins-SemiBold.ttf') }}') format('truetype');
            font-weight: 500;
            font-style: normal;
        }

        @font-face {
            font-family: "Poppins";
            src: url('{{ storage_path('fonts/Poppins-Regular.ttf') }}') format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: "Poppins";
            src: url('{{ storage_path('fonts/Poppins-Light.ttf') }}') format('truetype');
            font-weight: 100;
            font-style: normal;
        }

        @font-face {
            font-family: "Raleway";
            src: url('{{ storage_path('fonts/Raleway-Bold.ttf') }}') format('truetype');
            font-weight: 700;
            font-style: normal;
        }

        @font-face {
            font-family: "Raleway";
            src: url('{{ storage_path('fonts/Raleway-Regular.ttf') }}') format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: "Raleway";
            src: url('{{ storage_path('fonts/Raleway-Light.ttf') }}') format('truetype');
            font-weight: 100;
            font-style: normal;
        }

        /* para agregar estilos a la hoja @page */
        @page {
            padding: 0%;
            font-family: "Montserrat";


        }

        body {
            margin-top: 110px;
            /* Desplaza el contenido del cuerpo para evitar que quede oculto detrás del header */
            margin-bottom: 50px;
        }

        .salto {
            page-break-after: always;
        }

        #header {

            position: fixed;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 100px;
            /* Ajusta la altura según el tamaño de tu imagen */
            background-color: #ffffff;
            /* Color de fondo si la imagen no cubre todo el header */
            z-index: 1000;
            /* Asegura que el header esté por encima de otros elementos */
        }

        .imgHeader {
            float: left;

        }

        .infoHeader {
            position: absolute;
            margin-left: 3%;
            width: 100%;
            text-align: center;
            top: 50%;
            left: 45%;
            transform: translate(-50%, -50%);
            font-weight: 700;
            font-size: 19px;
            color: #030b3d;

        }

        #footer {

            position: fixed;
            bottom: 0%;
            left: 0%;

            width: 100%;
            text-align: left;
            /* Asegura que el contenido del footer esté alineado a la izquierda */
            margin: 0;
            padding: 2px;

            /* Ajusta el tamaño de fuente si es necesario */
        }

        .text1footer,
        .text2footer {
            display: table-cell;
            vertical-align: middle;
            /* Centra verticalmente */
        }

        .text1footer {
            margin: 0;
            padding: 2px;
            text-align: left;
            /* Asegura que los textos individuales estén alineados a la izquierda */
            clear: both;
            background-color: #d4d5d6;
            font-family: "Poppins";
            font-weight: 100;
            font-size: 9px;

        }

        .text2footer {
            margin-left: 10px;
            /* Espacio entre los textos */
            margin: 0;
            padding: 0;
            text-align: right;
            color: white;
            /* Asegura que los textos individuales estén alineados a la izquierda */
            clear: both;
            background-color: #01041f;
            font-family: "Poppins";
            font-weight: 500;
            font-size: 9px;
        }

        .textmiddle {
            background-color: #bb8d43;
            color: #bb8d43;

        }

        table.footer {
            width: 100%;
            border-collapse: collapse;
        }


        #informacionCaso table td {
            width: 100%;
            height: 5%;
        }

        #informacionCaso {
            display: block;
            clear: both;
            /* Para evitar cualquier flotado residual */
            margin-bottom: 20px;
            /* Espacio opcional entre los divs */
        }
        #fecha {
            display: block;
            clear: both;
            /* Para evitar cualquier flotado residual */

        }

        #content {
            display: block;
            clear: both;

        }

        .case-info {
            float: right;
            border: 1px solid #000;
            border-collapse: collapse;
            padding: 5px;

            font-weight: 100;
            font-size: 12px;
        }

        .case-info td {
            padding: 5px;
            border: 1px solid #000;
        }

        .date {
            float: right;

            padding: 5px;

            font-weight: 700;
            font-size: 14px;
        }

        .date td {
            padding: 5px;

        }

        .content {

        }

        .content p {
            font-size: 13px;
            line-height: 1.25;
        }

        .parrafosDenuncia {
            text-align: justify;
            line-height: 1;
        }

        p.parrafo1,
        p.parrafo2 {
            display: inline;
        }

        .bold,
        .parrafo1 {
            font-weight: bold;
        }

        .underline {
            text-decoration: underline;
        }

        h2.tituloDenuncia {
            text-align: center;
            font-size: 16px;
            /* Puedes ajustar el tamaño según sea necesario */
            margin-top: -10px;
            margin-bottom: 20px;

        }



        table.generalesDenunciante,
        table.lugarNacimiento,
        table.datosLocalizacion {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
        }

        table.generalesDenunciante th,
        table.generalesDenunciante td,
        table.lugarNacimiento th,
        table.lugarNacimiento td,
        table.datosLocalizacion th,
        table.datosLocalizacion td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }

        table.generalesDenunciante th {
            font-weight: bold;
        }

        .primerCeldaLocalizacion {
            width: 20%
        }
        #parrafo4{
            line-height: 1;

        }
        #denuncia table {
            width: 100%;
            border: 1px solid black;
            /* Borde de la tabla */
            border-collapse: collapse;
            /* Para que el borde se vea de forma continua */
            height: 100vh;
            /* Para ocupar el 100% de la altura de la página */
        }

        #denuncia table td {
            border: 1px solid black;
            /* Borde de la celda */
            text-align: justify;
            /* Texto centrado */
            font-weight: 400;
            vertical-align: middle;
            /* Centrar verticalmente */
            font-size: 14px;
            padding-left: 5px;
            padding-right: 5px;
            padding-bottom: 9%;
            padding-top: 1%;
        }

        #seccionFirmas table {
            width: 100%;
            text-align: center;
            padding-top: 20%;
        }

        #seccionFirmas table td.line {
            border-bottom: 1px solid black;
            /* Línea continua */
            padding: 5px;
            /* Espaciado interior de la celda */
            width: 100%;
            /* Para que ocupe el ancho completo */
        }

        .interCeldasFirmas {
            width: 10%;
        }
    </style>
</head>

<body>

    <div id="header">
        <img class="imgHeader" src="{{ public_path('img/fiscalia.PNG') }}" alt="">
        <div class="infoHeader">
            <h3>
                FISCALÍA GENERAL DEL ESTADO DE MICHOACÁN
            </h3>
        </div>
    </div>

    <div id="footer">
        <table class="footer" width="100%">
            <tr>
                <td class="text1footer">
                    Periférico Independencia #5000 Col. Sentimientos de la Nación Morelia Michoacán C.P. 58170 | (443)
                    322 3600 | @FiscaliaMich
                </td>
                <td class="textmiddle">_</td>
                <td class="text2footer" style="text-align: right;">
                    fiscaliamichoacan.gob.mx
                </td>
            </tr>
        </table>
    </div>

    <!-- Información del caso -->
    <div id="informacionCaso">
        <table class="case-info">
            <tr>
                <td><strong>Número Único de caso:</strong></td>
                <td>Sin asignar</td>
            </tr>
            <tr>
                <td><strong>Número de expediente:</strong></td>
                <td>PD/1427/0824P</td>
            </tr>
        </table>
    </div>

    <div id="fecha">
        <table class="date">
            <tr>
                <td>
                    <p>
                        Morelia, Michoacán a <span>28 de AGOSTO del 2024</span>
                    </p>
                </td>
            </tr>
        </table>
    </div>


    <!-- Contenido del documento -->
    <div class="content" id="content">

        <h2 class="tituloDenuncia">DENUNCIA</h2>
        <div class="parrafosDenuncia">
            <p class="parrafo1" id="parrafo1">
                En la Ciudad de <span class="underline">Morelia</span>, Michoacán de Ocampo, a las <span
                    class="underline">12:51 </span>horas, del día <span class="underline">28</span>, del mes
                de <span class="underline">AGOSTO</span>, del año <span class="underline">2024</span>, dos mil
                veinticuatro, se
                presenta ante el/la <span class="bold underline">Lic. GONZALEZ VENEGAS JORGE ALBERTO</span> Agente del
                Ministerio
                Público, de la Unidad de Investigación, de conformidad a las
                facultades que confieren los artículos 21 constitucional; 109, 212, 213, 217, 218, 221, 222 y 223 del
                Código Nacional de Procedimientos Penales, y de conformidad al apartado C. del artículo 20
                constitucional que a la letra establece: "De los derechos de la victima o del ofendido:
            </p>
            <p class="parrafo2" id="parrafo2">
                <span class="bold">I.</span> Recibir asesoría
                jurídica; ser informado de los derechos que en su favor establece la Constitución y, cuando lo solicite,
                ser
                informado del desarrollo del procedimiento penal. <span class="bold">II.</span> Coadyuvar con el
                Ministerio Público; a que se le
                reciban
                todos los datos o elementos de prueba con los que cuente, tanto en la investigación como en el proceso a
                que
                se desahoguen las diligencias correspondientes, y a intervenir en el juicio e interponer los recursos en
                los
                términos que prevea la ley. Cuando el Ministerio Público considere que no es necesario el desahogo de la
                diligencia, deberá fundar y motivar su negativa. <span class="bold">III.</span> Recibir, desde la
                comisión del delito, atención
                módica y
                psicológica de urgencia. <span class="bold">IV.</span> Que se le repare el daño. En los casos en que
                sea procedente, El Ministerio
                Público
                estará obligado a solicitar la reparación del daño, sin menoscabo de que la victima u ofendido lo pueda
                solicitar
                directamente, y el juzgador no podrá absolver al sentenciado de dicha reparación si ha emitido una
                sentencia
                condenatoria. La ley fijará procedimientos ágiles para ejecutar las sentencias en materia de reparación
                del daño.
                <span class="bold">V.</span> Al resguardo de su identidad y otros datos personales en los siguientes
                casos: cuando sean menores de
                edad; cuando se trate de delitos de violación, trata de personas, secuestro o delincuencia organizada; y
                cuando
                a juicio del juzgador sea necesario para su protección, salvaguardando en todo caso los derechos de la
                defensa. El Ministerio Público deberá garantizar la protección de victimas, ofendidos, testigos y en
                general todas
                los sujetos que intervengan en el proceso. Los jueces deberán vigilar el buen cumplimiento de esta
                obligación. <span class="bold">VI.</span> Solicitar las medidas cautelares y providencias necesarias
                para la protección y restitución de sus
                derechos, y
                <span class="bold">VII.</span> Impugnar ante autoridad judicial las omisiones del Ministerio Público
                en la investigación de los
                delitos, así
                como las resoluciones de reserva, no ejercicio, desistimiento de la acción penal o suspensión del
                procedimiento
                cuando no está satisfecha la reparación del daño.
            </p>
            <p class="bold" id="parrafo3">
                Quien enterado de lo anterior, proporciona la siguiente información:
            </p>


        </div>
        <div id="generalesDenunciante">
            <p class="bold">
                1.- GENERALES DEL DENUNCIANTE.
            </p>
            <table class="generalesDenunciante">
                <thead>

                </thead>
                <tbody>
                    <tr>
                        <th>NOMBRE (S)</th>
                        <th>APELLIDO PATERNO</th>
                        <th>APELLIDO MATERNO</th>
                        <th>EDAD</th>
                    </tr>
                    <tr>
                        <td>Maria de los Angeles</td>
                        <td>Cortés</td>
                        <td>Venegas</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th>GRADO DE ESTUDIOS</th>
                        <th>OCUPACIÓN</th>
                        <th colspan="2">ESTADO CIVIL</th>

                    </tr>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td colspan="2">-</td>

                    </tr>
                    <tr>
                        <th rowspan="2">DOCUMENTO CON QUE SE IDENTIFICA</th>
                        <th>TIPO</th>
                        <th colspan="2">FOLIO Y/O NUMERO</th>

                    </tr>
                    <tr>

                        <td>-</td>
                        <td colspan="2">-</td>

                    </tr>
                </tbody>
            </table>
        </div>
        <div id="lugarNacimiento">
            <p class="bold">
                2.- LUGAR DE NACIMIENTO.
            </p>
            <table class="lugarNacimiento">
                <thead>
                    <tr>
                        <th>PAIS</th>
                        <th>ESTADO</th>
                        <th>MUNICIPIO</th>
                        <th>CIUDAD Y/O LOCALIDAD.</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="datosLocalizacion">
            <p class="bold">
                2.- DATOS DE LOCALIZACIÓN.
            </p>
            <table class="datosLocalizacion">

                <tbody>
                    <tr>
                        <td rowspan="2" class="primerCeldaLocalizacion">DOMICILIO ACTUAL</td>
                        <td>CALLE</td>
                        <td>NÚMERO</td>
                        <td>COLONIA</td>
                        <td>CIUDAD</td>

                    </tr>
                    <tr>

                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>

                    </tr>
                    <tr>
                        <td rowspan="2" class="primerCeldaLocalizacion">DOMICILIO LABORAL</td>
                        <td>CALLE</td>
                        <td>NÚMERO</td>
                        <td>COLONIA</td>
                        <td>CIUDAD</td>

                    </tr>
                    <tr>

                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>

                    </tr>
                    <tr>
                        <td rowspan="2" class="primerCeldaLocalizacion">DOMICILIO PARA RECIBIR NOTIFICACIONES</td>
                        <td>CALLE</td>
                        <td>NÚMERO</td>
                        <td>COLONIA</td>
                        <td>CIUDAD</td>

                    </tr>
                    <tr>

                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>

                    </tr>
                    <tr>
                        <td rowspan="2" class="primerCeldaLocalizacion">TELEFONOS</td>
                        <td>PARTICULAR</td>
                        <td>CELULAR</td>
                        <td>LABORAL</td>
                        <td>OTRO</td>

                    </tr>
                    <tr>

                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>

                    </tr>
                    <tr>
                        <td colspan="2" class="primerCeldaLocalizacion">CORREO ELECTRÓNICO</td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div >
            <p class="bold" id="parrafo4">
                Sin más generales que agregar de su persona, con relación a los hechos que denuncia, de conformidad
                a lo dispuesto por los artículos 109, 131, 221, 222 y 223 del Código Nacional de Procedimientos Penales,
                el compareciente MANIFIESTA:
            </p>
        </div>

        <div id="denuncia">

            <table class="full-width">
                <tr>
                    <td>
                        El día jueves 22 de agosto siendo aproximadamente las 6:45 PM. Entre el entronque Quiroga y
                        la rancheria el Correo, me encontraba esperando el transporte para dirigirme hacia Morelia;
                        con la lluvia los autobuses no se detuvieron a subirme; después del tercer autobús se detuvo
                        más adelante de la parada por lo que corrí a tomarlo y en ese momento se cayó de mi mochila
                        sin darme cuenta hasta que ya en el autobús al revisar mis pertenencias no se encontraba el
                        gorro. Al día siguiente acudí nuevamente a primera hora a buscarlo sin encontrarlo

                    </td>
                </tr>
            </table>

        </div>

        <div id="seccionFirmas">
            <table>
                <thead>
                    <tr>
                        <td class="line"></td>
                        <td class="interCeldasFirmas"></td>
                        <td class="line"></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>AGENTE DEL MINISTERIO PÚBLICO</th>
                        <th class="interCeldasFirmas"></th>
                        <th>DENUNCIANTE</th>
                    </tr>
                    <tr>
                        <td>GONZALEZ VENEGAS JORGE ALBERTO</td>
                        <td class="interCeldasFirmas"></td>
                        <td>MARIA DE LOS ANGELES CORTéS VENEGAS</td>
                    </tr>
                </tbody>

            </table>

        </div>


    </div>

</body>

</html>
