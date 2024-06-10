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
            font-size: 12px

        }

        .header {
            margin-bottom: 20px;
            text-align: center
        }

        .title {
            font-size: 20px;
       
            margin-bottom: 10px;
        }

        .subtitle {
            font-size: 13px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .content {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .content p {
            text-align: left;
            margin: 0;
            display: inline-block; /* Cambio aquí */
        }
        .roman{
            border: 1px solid rgb(171, 171, 171);
            border-radius: 3%;
            padding: 10px;
            margin: 10px 0
        }

        .roman>p{
            padding: 3px
        }
        .bordered-text {
            border: 1px solid #ccc; /* Puedes ajustar el grosor y el color del borde según lo necesites */
            padding: 5px; /* Ajusta este valor según sea necesario */
            border-radius: 5px; /* Ajusta este valor si deseas bordes redondeados */
            margin-bottom: 5px;
        }
        span > .bordered-text{
            margin-bottom: 5px;
        }
       

div[style*="margin-bottom: 10px;"] input[type="checkbox"] {
    margin-bottom: -6px; /* Espacio entre el texto y el checkbox */
}

div[style*="margin-bottom: 5px;"] input[type="checkbox"] {
    margin-bottom: -6px; /* Espacio entre el texto y el checkbox */
}
div[style*="margin-bottom: 10px;"] label.wide-checkbox {
    min-width: 100px; /* Ajusta este valor según el ancho deseado */
}
    </style>
</head>
<body>
   <div>
    <img src="{{ asset('img/logo.png') }}" class="logo" style="margin-left:580px;position:absolute;margin-top:-30px" width="190" />
    <img src="{{ asset('img/escudo.png') }}" class="logo" style="margin-left:0;position:absolute;margin-top:-20px" width="60"/>
   </div>
   <br>
    <div class="header">
        <div class="title">GOBIERNO AUTÓNOMO MUNICIPAL DE EL ALTO</div>
        <hr width="70%">
        <div class="subtitle">SECRETARIA MUNICIPAL DE DESARROLLO HUMANO Y SOCIAL INTEGRAL <br>DIRECCIÓN DE DESARROLLO INTEGRAL <br> UNIDAD
            DE ADULTOS MAYORES <br>PROGRAMA DEFENSA Y RESTITUCIÓN DE DERECHOS DEL ADULTO MAYOR</div>
        <div class="title">FORMULARIO DE REGISTRO DE ATENCIÓN</div>
    </div>

    <div class="content">
        <div class="cabezera">
            <p><b>FECHA:</b> <span class="bordered-text" >{{ $registro->fecha }}</span></p>
            <p style="margin-left:14em"><b>TIPOLOGÍA:</b><span class="bordered-text" > {{ $registro->tipologia }}</span></p>
            <p style="margin-left:14em"><b>N° CASO:</b> <span class="bordered-text" >{{ $registro->nro_caso }}</span></p>
        </div>
        <br>
        <p style="padding-left: 30px;">I. DATOS GENERALES DE LA PERSONA ADULTA MAYOR:</p>
        <div class="roman">

        <p><b>NOMBRES Y APELLIDOS:</b><br>
  <div class="bordered-text">
    {{ $adulto->nombres }} {{ $adulto->apellido_paterno }} {{ $adulto->apellido_materno }}
  </div>
</p>



<div style="margin-bottom: 10px;">
<p><b>SEXO:</b></p>
<label>
    <input type="checkbox" name="gender" value="femenino" {{ strtolower($adulto->genero) == 'femenino' ? 'checked' : '' }} disabled>
    FEMENINO
  </label>
  <label>
    <input type="checkbox" name="gender" value="masculino" {{ strtolower($adulto->genero) == 'masculino' ? 'checked' : '' }} disabled>
    MASCULINO
  </label>



<?php
  $fecha_nacimiento = $adulto->fecha_nacimiento;
  $fecha_nacimiento = new DateTime($fecha_nacimiento);
  $anio_actual = date('Y');
  $anio_nacimiento = $fecha_nacimiento->format('Y');
  $edad = $anio_actual - $anio_nacimiento;
?>

<p><b>EDAD:</b> <span class="bordered-text" style="padding: 5px 40px;">{{ $edad }} años</span></p>

<p><b>N° CI:</b> <span class="bordered-text" style="padding: 5px 75px;">{{ $adulto->ci }} {{ $adulto->extension }}</span></p> <br>

</div>
<?php
// Supongamos que $adulto->fecha_nacimiento es una cadena de texto con la fecha en formato 'Y-m-d'
$fecha_nacimiento = new DateTime($adulto->fecha_nacimiento);
$fecha_formateada = $fecha_nacimiento->format('d') . ' de ' . $fecha_nacimiento->format('F') . ' de ' . $fecha_nacimiento->format('Y');

// Traducción de los nombres de los meses al español
$meses_en_espanol = array(
    'January' => 'enero',
    'February' => 'febrero',
    'March' => 'marzo',
    'April' => 'abril',
    'May' => 'mayo',
    'June' => 'junio',
    'July' => 'julio',
    'August' => 'agosto',
    'September' => 'septiembre',
    'October' => 'octubre',
    'November' => 'noviembre',
    'December' => 'diciembre'
);

$mes_formateado = $meses_en_espanol[$fecha_nacimiento->format('F')];
$fecha_final = $fecha_nacimiento->format('d') . ' de ' . $mes_formateado . ' de ' . $fecha_nacimiento->format('Y');
?>

<p><b>FECHA DE NACIMIENTO:</b> <span class="bordered-text" style="padding: 5px 55px;">{{ $fecha_final }}</span></p>


<p><b>N° DE REFERENCIA:</b> <span class="bordered-text">{{ $adulto->nro_referencia }}</span></p> <br>

<div style="margin-bottom: 5px;">
    <p><b>ESTADO CIVIL:</b></p>
    <label>
        <input type="checkbox" name="estado_civil" value="soltero(a)" {{ in_array(strtolower($adulto->estado_civil), ['soltero', 'soltera']) ? 'checked' : '' }} disabled>
        SOLTERO(A)
    </label>
    <label>
        <input type="checkbox" name="estado_civil" value="casado(a)" {{ in_array(strtolower($adulto->estado_civil), ['casado', 'casada']) ? 'checked' : '' }} disabled>
        CASADO(A)
    </label>
    <label>
        <input type="checkbox" name="estado_civil" value="concubino(a)" {{ in_array(strtolower($adulto->estado_civil), ['concubino', 'concubina']) ? 'checked' : '' }} disabled>
        CONCUBINO(A)
    </label>
    <label>
        <input type="checkbox" name="estado_civil" value="divorciado(a)" {{ in_array(strtolower($adulto->estado_civil), ['divorciado', 'divorciada']) ? 'checked' : '' }} disabled>
        DIVORCIADO(A)
    </label>
    <label>
        <input type="checkbox" name="estado_civil" value="viudo(a)" {{ in_array(strtolower($adulto->estado_civil), ['viudo', 'viuda']) ? 'checked' : '' }} disabled>
        VIUDO(A)
    </label>
</div>

<p><b>N° Y NOMBRE DE HIJOS:</b> <span class="bordered-text" style="padding: 5px 55px;">{{ $adulto->cantidad_hijos }}
  @foreach ($hijos as $index => $hijo)
      {{ $hijo->nombre_completo }}{{ $index < $adulto->cantidad_hijos - 1 ? ', ' : '' }}
  @endforeach
</span></p> <br>

<div style="margin-bottom: 10px;">
    <p><b>GRADO DE INSTRUCCIÓN:</b></p>
    <label>
        <input type="checkbox" name="grado_instruccion" value="primaria" {{ strtolower($adulto->grado_instruccion) == 'primaria' ? 'checked' : '' }} disabled>
        PRIMARIA
    </label>
    <label>
        <input type="checkbox" name="grado_instruccion" value="secundaria" {{ strtolower($adulto->grado_instruccion) == 'secundaria' ? 'checked' : '' }} disabled>
        SECUNDARIA
    </label>
    <label>
        <input type="checkbox" name="grado_instruccion" value="tecnico" {{ in_array(strtolower($adulto->grado_instruccion), ['tecnico', 'técnico']) ? 'checked' : '' }} disabled>
        TÉCNICO
    </label>
    <label>
        <input type="checkbox" name="grado_instruccion" value="universitario" {{ strtolower($adulto->grado_instruccion) == 'universitario' ? 'checked' : '' }} disabled>
        UNIVERSITARIO
    </label>
    <label>
        <input type="checkbox" name="grado_instruccion" value="sinst" {{ strtolower($adulto->grado_instruccion) == 'sinst' || strtolower($adulto->grado_instruccion) == 's/inst' ? 'checked' : '' }} disabled>
        S/INST.
    </label>
</div>


<div style="margin-bottom: 10px;">
<p><b>OCUPACIÓN:</b> <span class="bordered-text" style="padding: 5px 55px;">{{ $adulto->ocupacion }}</span></p>

    <label>
        RENTA DIGNIDAD
        <input type="checkbox" name="situacion" value="renta dignidad" {{ strtolower($adulto->situacion) == 'renta dignidad' ? 'checked' : '' }} disabled>
    </label>
    <label>
        JUBILADO
        <input type="checkbox" name="situacion" value="jubilado" {{ strtolower($adulto->situacion) == 'jubilado' ? 'checked' : '' }} disabled>
    </label>
    <label>
        NINGUNO
        <input type="checkbox" name="situacion" value="ninguno" {{ strtolower($adulto->situacion) == 'ninguno' ? 'checked' : '' }} disabled>
    </label>
</div>

<div style="margin-bottom: 10px;">
    <p><b>DOMICILIO:</b></p>
    <label>
        PROPIO
        <input type="checkbox" name="domicilio" value="propio" {{ strtolower($adulto->domicilio) == 'propio' ? 'checked' : '' }} disabled>
    </label>
    <label>
        ALQUILADO
        <input type="checkbox" name="domicilio" value="alquilado" {{ strtolower($adulto->domicilio) == 'alquilado' ? 'checked' : '' }} disabled>
    </label>
    <label>
        ANTICRETICO
        <input type="checkbox" name="domicilio" value="anticretico" {{ strtolower($adulto->domicilio) == 'anticretico' ? 'checked' : '' }} disabled>
    </label>
    <label>
        CEDIDO
        <input type="checkbox" name="domicilio" value="cedido" {{ strtolower($adulto->domicilio) == 'cedido' ? 'checked' : '' }} disabled>
    </label>
    <label class="wide-checkbox">
        OTRO
        <input type="checkbox" name="domicilio" value="otro" {{ strtolower($adulto->domicilio) == 'otro' ? 'checked' : '' }} disabled>
    </label>
</div>

<p><b>DISTRITO:</b> <span class="bordered-text"  style="padding: 5px 15px;">{{ $adulto->distrito }}</span></p>

<p><b>ZONA:</b> <span class="bordered-text" style="padding: 5px 25px;">{{ $adulto->zona }}</span></p>

<p><b>CALLE O AV:</b> <span class="bordered-text" style="padding: 5px 55px;">{{ $adulto->calle }}</span></p>

<p><b>N°:</b> <span class="bordered-text" style="padding: 5px 15px;">{{ $adulto->nro }}</span></p>
<br>
<div style="margin-bottom: 10px;">
    <p><b>AREA:</b></p>
    <label>
        URBANO
        <input type="checkbox" name="area" value="urbano" {{ strtolower($adulto->area) == 'urbano' ? 'checked' : '' }} disabled>
    </label>
    <label>
        RURAL
        <input type="checkbox" name="area" value="rural" {{ strtolower($adulto->area) == 'rural' ? 'checked' : '' }} disabled>
    </label>
    <p><b>Otro Municipio:</b> <span class="bordered-text" style="padding: 5px 55px;">{{ $adulto->otro_municipio }}</span></p>

</div>

        </div>
        <p  style="padding-left: 30px;">II. DESCRIPCIÓN DE LOS HECHOS </p>
        <div class="roman">

            <p>{{ $registro->descripcion}}</p>
        </div>
        <p  style="padding-left: 30px;"> III. PETICIÓN DE LA PERSONA ADULTA MAYOR </p>
        <div class="roman">

            <p>{{ $registro->peticion}}</p>
        </div>
        <p  style="padding-left: 30px;">IV. NOMBRES Y APELLIDO DE DENUNCIADO(A) </p>
        <div class="roman">

            <p>{{ $registro->nombres_denunciado}}</p>
        </div>
        <div style="margin-bottom: 10px;">
    <p style="padding-left: 30px;">IV. ACCIONES REALIZADAS</p> <br>
    <label style="padding-left: 30px;">
        APERTURA CASO
        <input type="checkbox" name="acciones" value="apertura caso" {{ in_array(strtolower($registro->acciones), ['apertura caso']) ? 'checked' : '' }} disabled>
    </label>
    <label style="padding-left: 30px;">
        ORIENTACION
        <input type="checkbox" name="acciones" value="orientacion" {{ in_array(strtolower($registro->acciones), ['orientacion']) ? 'checked' : '' }} disabled>
    </label>
    <label style="padding-left: 30px;">
        CITACION
        <input type="checkbox" name="acciones" value="citacion" {{ in_array(strtolower($registro->acciones), ['citacion']) ? 'checked' : '' }} disabled>
    </label>
    <label style="padding-left: 30px;">
        DERIVACION
        <input type="checkbox" name="acciones" value="derivacion" {{ in_array(strtolower($registro->acciones), ['derivacion']) ? 'checked' : '' }} disabled>
    </label>
</div>

    </div>

    <br><br><br><br>
<span>   FIRMA O HUELLA DEL ADULTO(A) MAYOR </span><span style="margin-left: 80px;">FIRMA Y SELLO DEL (LA) PROFESIONAL</span>
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
