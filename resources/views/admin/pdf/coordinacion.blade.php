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
            font-size: 12px;
        }

        .header {
            margin-bottom: 10px; /* Reduce margin */
            text-align: center;
        }

        .title {
            font-size: 20px;
            margin-bottom: 5px; /* Reduce margin */
        }

        .subtitle {
            font-size: 13px;
            margin-bottom: 5px; /* Reduce margin */
            font-weight: bold;
        }

        .content {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px; /* Reduce gap */
            margin-bottom: 10px; /* Reduce margin */
        }

        .content p {
            text-align: left;
            margin: 0;
            display: inline-block;
        }

        .roman {
            border: 1px solid rgb(171, 171, 171);
            border-radius: 3%;
            padding: 5px; /* Reduce padding */
            margin: 5px 0; /* Reduce margin */
        }

        .roman>p {
            padding: 3px;
        }

        .bordered-text {
            border: 1px solid #ccc;
            padding: 5px;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        span>.bordered-text {
            margin-bottom: 5px;
        }

        div[style*="margin-bottom: 10px;"] input[type="checkbox"] {
            margin-bottom: -6px;
        }

        div[style*="margin-bottom: 5px;"] input[type="checkbox"] {
            margin-bottom: -6px;
        }

        div[style*="margin-bottom: 10px;"] label.wide-checkbox {
            min-width: 100px;
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
        <div class="subtitle">
            SECRETARIA MUNICIPAL DE DESARROLLO HUMANO Y SOCIAL INTEGRAL <br>
            DIRECCIÓN DE DESARROLLO INTEGRAL <br>
            UNIDAD DE ADULTOS MAYORES <br>
            PROGRAMA DEFENSA Y RESTITUCIÓN DE DERECHOS DEL ADULTO MAYOR
        </div>
        <br>
        <div class="title"><b>FICHA DE COORDINACIÓN DE CASO</b></div>
        <br>
    </div>

    <div class="content">
        <div class="cabezera">
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
