<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario de Registro de Atención</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
<<<<<<< HEAD
            font-size: 12px;
        }

        .header {
            margin-bottom: 10px; /* Reduce margin */
            text-align: center;
=======
            font-size: 12px
        }

        .header {
            margin-bottom: 20px;
            text-align: center
>>>>>>> 3609d3d (trabajando en los pdfs)
        }

        .title {
            font-size: 20px;
<<<<<<< HEAD
            margin-bottom: 5px; /* Reduce margin */
=======

            margin-bottom: 10px;
>>>>>>> 3609d3d (trabajando en los pdfs)
        }

        .subtitle {
            font-size: 13px;
<<<<<<< HEAD
            margin-bottom: 5px; /* Reduce margin */
=======
            margin-bottom: 10px;
>>>>>>> 3609d3d (trabajando en los pdfs)
            font-weight: bold;
        }

        .content {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
<<<<<<< HEAD
            gap: 10px; /* Reduce gap */
            margin-bottom: 10px; /* Reduce margin */
=======
            gap: 20px;
            margin-bottom: 20px;
>>>>>>> 3609d3d (trabajando en los pdfs)
        }

        .content p {
            text-align: left;
            margin: 0;
            display: inline-block;
<<<<<<< HEAD
=======
            /* Cambio aquí */
>>>>>>> 3609d3d (trabajando en los pdfs)
        }

        .roman {
            border: 1px solid rgb(171, 171, 171);
            border-radius: 3%;
<<<<<<< HEAD
            padding: 5px; /* Reduce padding */
            margin: 5px 0; /* Reduce margin */
        }

        .roman>p {
            padding: 3px;
=======
            padding: 10px;
            margin: 10px 0
        }

        .roman>p {
            padding: 3px
>>>>>>> 3609d3d (trabajando en los pdfs)
        }

        .bordered-text {
            border: 1px solid #ccc;
<<<<<<< HEAD
            padding: 5px;
            border-radius: 5px;
=======
            /* Puedes ajustar el grosor y el color del borde según lo necesites */
            padding: 5px;
            /* Ajusta este valor según sea necesario */
            border-radius: 5px;
            /* Ajusta este valor si deseas bordes redondeados */
>>>>>>> 3609d3d (trabajando en los pdfs)
            margin-bottom: 5px;
        }

        span>.bordered-text {
            margin-bottom: 5px;
        }

<<<<<<< HEAD
        div[style*="margin-bottom: 10px;"] input[type="checkbox"] {
            margin-bottom: -6px;
=======

        div[style*="margin-bottom: 10px;"] input[type="checkbox"] {
            margin-bottom: -6px;
            /* Espacio entre el texto y el checkbox */
>>>>>>> 3609d3d (trabajando en los pdfs)
        }

        div[style*="margin-bottom: 5px;"] input[type="checkbox"] {
            margin-bottom: -6px;
<<<<<<< HEAD
=======
            /* Espacio entre el texto y el checkbox */
>>>>>>> 3609d3d (trabajando en los pdfs)
        }

        div[style*="margin-bottom: 10px;"] label.wide-checkbox {
            min-width: 100px;
<<<<<<< HEAD
=======
            /* Ajusta este valor según el ancho deseado */
>>>>>>> 3609d3d (trabajando en los pdfs)
        }
    </style>
</head>

<body>
    <div>
        <img src="{{ asset('img/logo.png') }}" class="logo" style="margin-left:580px;position:absolute;margin-top:-30px" width="190" />
        <img src="{{ asset('img/escudo.png') }}" class="logo" style="margin-left:0;position:absolute;margin-top:-20px" width="60" />
    </div>
    <br>
    <div class="header">
        <div class="title">GOBIERNO AUTÓNOMO MUNICIPAL DE EL ALTO</div>
        <hr width="70%">
<<<<<<< HEAD
        <div class="subtitle">
            SECRETARIA MUNICIPAL DE DESARROLLO HUMANO Y SOCIAL INTEGRAL <br>
            DIRECCIÓN DE DESARROLLO INTEGRAL <br>
            UNIDAD DE ADULTOS MAYORES <br>
            PROGRAMA DEFENSA Y RESTITUCIÓN DE DERECHOS DEL ADULTO MAYOR
        </div>
        <br>
        <div class="title"><b>FICHA DE COORDINACIÓN DE CASO</b></div>
        <br>
=======
        <div class="subtitle">SECRETARIA MUNICIPAL DE DESARROLLO HUMANO Y SOCIAL INTEGRAL <br>DIRECCIÓN DE DESARROLLO INTEGRAL <br> UNIDAD
            DE ADULTOS MAYORES <br>PROGRAMA DEFENSA Y RESTITUCIÓN DE DERECHOS DEL ADULTO MAYOR</div>
        <div class="title">FICHA DE COORDINACIÓN DE CASO</div>
>>>>>>> 3609d3d (trabajando en los pdfs)
    </div>

    <div class="content">
        <div class="cabezera">
<<<<<<< HEAD
            <p><b>FECHA:</b> <span>{{ $registro->fecha }}</span></p>
            <p style="margin-left:14em"><b>N° CASO:</b> <span>{{ $registro->nro_caso }}</span></p>
        </div>
        <br>
        <p style="padding-left: 10px;">DE: {{ $coordinacion->area_origen }}</p>
        <br>
        <p style="padding-left: 10px;">A: {{ $coordinacion->area_destino }}</p>
        <hr>
    </div>
    <p style="padding-left: 30px;"><b>I. DATOS DEL CASO INTERVENIDO:</b></p>
    <div>
        <p>
            NOMBRES: {{ $adulto->nombres }} {{ $adulto->apellido_paterno }} {{ $adulto->apellido_materno }} <br><br>
            <?php
            $fecha_nacimiento = $adulto->fecha_nacimiento;
            $fecha_nacimiento = new DateTime($fecha_nacimiento);
            $anio_actual = date('Y');
            $anio_nacimiento = $fecha_nacimiento->format('Y');
            $edad = $anio_actual - $anio_nacimiento;
            ?>
            EDAD: {{ $edad }} años
        </p>
    </div>
    <hr>
    <p style="padding-left: 30px;"><b>II. INTERVENCIÓN QUE REALIZA </b></p>
    <div>
        <p>{{ $coordinacion->intervencion }}</p>
    </div>
    <hr>
    <p style="padding-left: 30px;"><b>III. REQUERIMIENTO Y/O SUGERENCIA</b></p>
    <div>
        <p>{{ $coordinacion->requerimiento }}</p>
    </div>

    <br><br><br><br>
    <span style="margin-left: 40px;">ENTREGADO POR: (SELLO Y FIRMA)</span>
    <span style="margin-left: 200px;">RECIBIDO POR (SELLO Y FIRMA)</span>
    <script type="text/php">
    if ( isset($pdf) ) {
        $pdf->page_script('
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
            $pdf->text(150, 800,"Avenida Costanera N 5022, Urbanización Libertad, entre calles J.J. Torres y Hernan Siles", $font, 8);
            $pdf->text(150, 810,"(Jacha Uta - Piso Planta Baja) a media cuadra de la Estación de Bomberos El Alto", $font, 8);
        ');
    }
</script>
</body>


</html>
=======
            <p><b>FECHA:</b> <span class="bordered-text">{{ $registro->fecha }}</span></p>
            <p style="margin-left:14em"><b>N° CASO:</b> <span class="bordered-text">{{ $registro->nro_caso }}</span></p>
        </div>
        <br>
        <p style="padding-left: 10px;">DE:</p> <br><br><br>
        <p style="padding-left: 10px;">A:</p>
        <hr>
    </div>
    <p style="padding-left: 30px;">I. DATOS DEL CASO INTERVENIDO:</p>
    <div>

        <p>NOMBRES:
      
            {{ $adulto->nombres }} {{ $adulto->apellido_paterno }} {{ $adulto->apellido_materno }}
       <br><br>
        <?php
        $fecha_nacimiento = $adulto->fecha_nacimiento;
        $fecha_nacimiento = new DateTime($fecha_nacimiento);
        $anio_actual = date('Y');
        $anio_nacimiento = $fecha_nacimiento->format('Y');
        $edad = $anio_actual - $anio_nacimiento;
        ?>
        EDAD:        {{ $edad }} años 

        </p>


    </div>
    <hr>
    <p style="padding-left: 30px;">II. INTERVENCIÓN QUE REALIZA </p>
    <div class="roman">

        <p>{{ $registro->descripcion}}</p>
    </div>
    <hr>
    <p style="padding-left: 30px;"> III. REQUERIMIENTO Y/O SUGERENCIA </p>
    <div class="roman">

        <p>{{ $registro->peticion}}</p>
    </div>


    </div>

    <br><br><br><br>
    <span style="margin-left: 40px;"> ENTREGADO POR: (SELLO Y FIRMA) </span><span style="margin-left: 200px;">RECIBIDO POR (SELLO Y FIRMA)</span>
</body>
<script type="text/php">
    if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(150, 800,"Avenida Costanera N 5022, Urbanización Libertad , entre calles J.J. Torres y Hernan Siles", $font, 8);
                $pdf->text(150, 810,"(Jacha Uta - Piso Planta Baja) a media cuadra de la Estación de Bomberos El Alto", $font, 8);
          
            ');
        }
    </script>

</html>
>>>>>>> 3609d3d (trabajando en los pdfs)
