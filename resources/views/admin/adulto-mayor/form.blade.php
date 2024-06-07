
        <fieldset class="border rounded-3 p-3">
            <legend class="float-none w-auto" >Datos personales</legend>
            
     

<div class="row">

    <div class="col-md-4">
        <div class="form-group {{ $errors->has('nombres') ? 'has-error' : ''}}">
            <label for="nombres" class="block font-medium text-sm text-gray-700"><i class="fas fa-user-edit"></i> {{ 'Nombres' }}</label>
            <input class="form-control" id="nombres" name="nombres" required type="text" maxlength="25" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" placeholder="Ingresa el o los nombres" value="{{ isset($adultomayor->nombres) ? $adultomayor->nombres : ''}}" required>
            <small id="error-nombres" class="text-danger d-none">Error: solo se permiten letras.</small>

            {!! $errors->first('nombres', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div class="col-md-4">
        <div class="form-group {{ $errors->has('apellido_paterno') ? 'has-error' : ''}}">
            <label for="apellido_paterno" class="block font-medium text-sm text-gray-700"><i class="fas fa-user-alt"></i> {{ 'Apellido Paterno' }}</label>
            <input class="form-control" id="apellido_paterno" required name="apellido_paterno" type="text" maxlength="15" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" placeholder="Ingresa el apellido paterno" value="{{ isset($adultomayor->apellido_paterno) ? $adultomayor->apellido_paterno : ''}}" required>
            <small id="error-apellido-paterno" class="text-danger d-none">Error: solo se permiten letras.</small>
                        {!! $errors->first('apellido_paterno', '<p class="help-block">:message</p>') !!}
        </div>
    </div>


    <div class="col-md-4">
        <div class="form-group {{ $errors->has('apellido_materno') ? 'has-error' : ''}}">
            <label for="apellido_materno" class="block font-medium text-sm text-gray-700"><i class="fas fa-female"></i> {{ 'Apellido Materno' }}</label>
            <input class="form-control" id="apellido_materno" required name="apellido_materno" type="text" maxlength="15" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" placeholder="Ingresa el apellido materno" value="{{ isset($adultomayor->apellido_materno) ? $adultomayor->apellido_materno : ''}}" required>
            <small id="error-apellido-materno" class="text-danger d-none">Error: solo se permiten letras.</small>
                        {!! $errors->first('apellido_materno', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-2">
        <div class="form-group {{ $errors->has('genero') ? 'has-error' : ''}}">
            <label class="block font-medium text-sm text-gray-700"><i class="fas fa-user-friends"></i> {{ 'Género' }}</label>
            <div>
                <input type="checkbox" id="genero_masculino" name="genero" value="Masculino" {{ isset($adultomayor->genero) && $adultomayor->genero == 'Masculino' ? 'checked' : '' }} required>
                <label for="genero_masculino">Masculino</label>
            </div>
            <div style="margin-top:-0.5em">
                <input type="checkbox" id="genero_femenino" name="genero" value="Femenino" {{ isset($adultomayor->genero) && $adultomayor->genero == 'Femenino' ? 'checked' : '' }} required>
                <label for="genero_femenino">Femenino</label>
            </div>
            {!! $errors->first('genero', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('input[name="genero"]').on('change', function(){
                $('input[name="genero"]').prop('required', false); // Desactiva la validación requerida
                $(this).prop('required', true); // Activa la validación requerida solo para el checkbox seleccionado
            });
        });
    </script>

    <div class="col-md-2">
        <div class="form-group {{ $errors->has('ci') ? 'has-error' : ''}}">
            <label for="ci" class="block font-medium text-sm text-gray-700"><i class="fas fa-id-card"></i> {{ 'Ci' }}</label>
            <input class="form-control" id="ci" name="ci" type="text" maxlength="8" pattern="[0-9]{1,8}" placeholder="Ingresa número de carnet" value="{{ isset($adultomayor->ci) ? $adultomayor->ci : ''}}" required>
            <small id="error-ci" class="text-danger d-none">Error: solo se permiten números.</small>

                        {!! $errors->first('ci', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group {{ $errors->has('ci') ? 'has-error' : ''}}">
            <label for="ci" class="block font-medium text-sm text-gray-700"><i class="fas fa-id-card"></i> {{ 'Complemento' }}</label>
            <input class="form-control" id="complemento" name="complemento" type="text" maxlength="8" placeholder="Ingresa número de carnet" value="{{ isset($adultomayor->ci) ? $adultomayor->ci : ''}}" required>
            <small id="error-ci" class="text-danger d-none">Error: solo se permiten números.</small>

                        {!! $errors->first('ci', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group {{ $errors->has('extension') ? 'has-error' : ''}}">
            <label for="extension"  class="block font-medium text-sm text-gray-700"><i class="fas fa-id-card"></i> {{ 'Extensión' }}</label>
            <select class="form-control" required id="extension" name="extension">
                <option value="" disabled selected>Selecciona una extensión</option>
                <option value="LP" {{ isset($adultomayor->extension) && $adultomayor->extension == 'LP' ? 'selected' : '' }}>LP</option>
                <option value="CB" {{ isset($adultomayor->extension) && $adultomayor->extension == 'CB' ? 'selected' : '' }}>CB</option>
                <option value="SC" {{ isset($adultomayor->extension) && $adultomayor->extension == 'SC' ? 'selected' : '' }}>SC</option>
                <option value="OR" {{ isset($adultomayor->extension) && $adultomayor->extension == 'OR' ? 'selected' : '' }}>OR</option>
                <option value="PT" {{ isset($adultomayor->extension) && $adultomayor->extension == 'PT' ? 'selected' : '' }}>PT</option>
                <option value="CH" {{ isset($adultomayor->extension) && $adultomayor->extension == 'CH' ? 'selected' : '' }}>CH</option>
                <option value="TJ" {{ isset($adultomayor->extension) && $adultomayor->extension == 'TJ' ? 'selected' : '' }}>TJ</option>
                <option value="BN" {{ isset($adultomayor->extension) && $adultomayor->extension == 'BN' ? 'selected' : '' }}>BN</option>
                <option value="PA" {{ isset($adultomayor->extension) && $adultomayor->extension == 'PA' ? 'selected' : '' }}>PA</option>
            </select>
            {!! $errors->first('extension', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group {{ $errors->has('fecha_nacimiento') ? 'has-error' : ''}}">
            <label for="fecha_nacimiento" class="block font-medium text-sm text-gray-700"><i class="far fa-calendar-alt"></i> {{ 'Fecha Nacimiento' }}</label>
            <input class="form-control" required id="fecha_nacimiento" name="fecha_nacimiento" type="date" max="{{ date('Y-m-d') }}" value="" placeholder="dd/mm/yyyy">
            {!! $errors->first('fecha_nacimiento', '<p class="help-block">:message</p>') !!}

        </div>


    </div>
    <div class="col-md-2">
        <div class="form-group {{ $errors->has('nro_referencia') ? 'has-error' : ''}}">
            <label for="nro_referencia" class="block font-medium text-sm text-gray-700"><i class="fas fa-phone"></i> {{ 'Nro telefono' }}</label>
            <input class="form-control" id="nro_referencia" name="nro_referencia" type="text" maxlength="8" pattern="[0-9]{1,8}" placeholder="Ingresa número de referencia" value="{{ isset($adultomayor->nro_referencia) ? $adultomayor->nro_referencia : ''}}" required>
            <small id="error-nro_referencia" class="text-danger d-none">Error: solo ingresar números.</small>

                        {!! $errors->first('nro_referencia', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

</div>



<div class="row">
    <div class="col-md-2">
        <div class="form-group {{ $errors->has('estado_civil') ? 'has-error' : ''}}">
            <label for="estado_civil" class="block font-medium text-sm text-gray-700"><i class="fas fa-user-tie"></i> {{ 'Estado Civil' }}</label>
            <select class="form-control" required id="estado_civil" name="estado_civil">
                <option value="" disabled selected>Selecciona un estado civil</option>
                <option value="Soltero" {{ isset($adultomayor->estado_civil) && $adultomayor->estado_civil == 'Soltero' ? 'selected' : '' }}>Soltero</option>
                <option value="Casado" {{ isset($adultomayor->estado_civil) && $adultomayor->estado_civil == 'Casado' ? 'selected' : '' }}>Casado</option>
                <option value="Viudo" {{ isset($adultomayor->estado_civil) && $adultomayor->estado_civil == 'Viudo' ? 'selected' : '' }}>Viudo</option>
                <option value="Divorciado" {{ isset($adultomayor->estado_civil) && $adultomayor->estado_civil == 'Divorciado' ? 'selected' : '' }}>Divorciado</option>
                <option value="Unión Libre" {{ isset($adultomayor->estado_civil) && $adultomayor->estado_civil == 'Unión Libre' ? 'selected' : '' }}>Unión Libre</option>
                <option value="Separado" {{ isset($adultomayor->estado_civil) && $adultomayor->estado_civil == 'Separado' ? 'selected' : '' }}>Separado</option>

                <!-- Puedes agregar más opciones según sea necesario -->
            </select>
            {!! $errors->first('estado_civil', '<p class="help-block">:message</p>') !!}
        </div>

    </div>
    <div class="col-md-3">
        <div class="form-group {{ $errors->has('grado_instruccion') ? 'has-error' : ''}}">
            <label for="grado_instruccion" class="block font-medium text-sm text-gray-700"><i class="fas fa-user-tie"></i> {{ 'Grado Instrucción' }}</label>
            <select class="form-control" required id="grado_instruccion" name="grado_instruccion">
                <option value="" disabled selected>Selecciona un grado de instrucción</option>
                <option value="Ninguno" {{ isset($adultomayor->grado_instruccion) && $adultomayor->grado_instruccion == 'Ninguno' ? 'selected' : '' }}>Ninguno</option>
                <option value="Primaria Completa" {{ isset($adultomayor->grado_instruccion) && $adultomayor->grado_instruccion == 'Primaria Completa' ? 'selected' : '' }}>Primaria Completa</option>
                <option value="Secundaria Completa" {{ isset($adultomayor->grado_instruccion) && $adultomayor->grado_instruccion == 'Secundaria Completa' ? 'selected' : '' }}>Secundaria Completa</option>
                <option value="Bachiller" {{ isset($adultomayor->grado_instruccion) && $adultomayor->grado_instruccion == 'Bachiller' ? 'selected' : '' }}>Bachiller</option>
                <option value="Técnico Superior" {{ isset($adultomayor->grado_instruccion) && $adultomayor->grado_instruccion == 'Técnico Superior' ? 'selected' : '' }}>Técnico Superior</option>
                <option value="Licenciatura" {{ isset($adultomayor->grado_instruccion) && $adultomayor->grado_instruccion == 'Licenciatura' ? 'selected' : '' }}>Licenciatura</option>
                <option value="Maestría" {{ isset($adultomayor->grado_instruccion) && $adultomayor->grado_instruccion == 'Maestría' ? 'selected' : '' }}>Maestría</option>
                <option value="Doctorado" {{ isset($adultomayor->grado_instruccion) && $adultomayor->grado_instruccion == 'Doctorado' ? 'selected' : '' }}>Doctorado</option>
                <option value="Post-Doctorado" {{ isset($adultomayor->grado_instruccion) && $adultomayor->grado_instruccion == 'Post-Doctorado' ? 'selected' : '' }}>Post-Doctorado</option>
                <!-- Agrega más opciones según los grados de instrucción que desees -->
            </select>
            {!! $errors->first('grado_instruccion', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group {{ $errors->has('ocupacion') ? 'has-error' : ''}}">
            <label for="ocupacion" class="block font-medium text-sm text-gray-700"><i class="fas fa-user-md"></i> {{ 'Ocupacion' }}</label>
            <input class="form-control" id="ocupacion" required maxlength="15" name="ocupacion" type="text" value="{{ isset($adultomayor->ocupacion) ? $adultomayor->ocupacion : ''}}" >
            {!! $errors->first('ocupacion', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group {{ $errors->has('situacion') ? 'has-error' : ''}}">
            <label for="situacion" class="block font-medium text-sm text-gray-700"><i class="fas fa-user-tag"></i> {{ 'Situación' }}</label>
            <select class="form-control" name="situacion" id="situacion">
                <option value="Jubilado" {{ isset($adultomayor->situacion) && $adultomayor->situacion == 'Jubilado' ? 'selected' : '' }}>Jubilado</option>
                <option value="Renta Dignidad" {{ isset($adultomayor->situacion) && $adultomayor->situacion == 'Renta Dignidad' ? 'selected' : '' }}>Renta Dignidad</option>
                <option value="Jubilado y Renta Dignidad" {{ isset($adultomayor->situacion) && $adultomayor->situacion == 'Jubilado y Renta Dignidad' ? 'selected' : '' }}>Jubilado y Renta Dignidad</option>
                <option value="Ninguno" {{ isset($adultomayor->situacion) && $adultomayor->situacion == 'Ninguno' ? 'selected' : '' }}>Ninguno</option>
            </select>
            {!! $errors->first('situacion', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"][name="situacion"]');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        checkboxes.forEach(otherCheckbox => {
                            if (otherCheckbox !== this) {
                                otherCheckbox.checked = false;
                            }
                        });
                    }
                });
            });
        });
    </script>

</div>
</fieldset>

<fieldset class="border rounded-3 p-3">
            <legend class="float-none w-auto" >Datos de vivienda</legend>
            
     

<div class="row">
 <div class="col-md-2">
    <div class="form-group {{ $errors->has('domicilio') ? 'has-error' : ''}}">
        <label for="domicilio" class="block font-medium text-sm text-gray-700"><i class="fas fa-home"></i> {{ 'Domicilio' }}</label>
        <select class="form-control" id="domicilio" name="domicilio">
            <option value="" {{ !isset($adultomayor->domicilio) ? 'selected' : '' }}>Seleccione una opción</option>
            <option value="Propio" {{ isset($adultomayor->domicilio) && $adultomayor->domicilio == 'Propio' ? 'selected' : '' }}>Propio</option>
            <option value="Alquilado" {{ isset($adultomayor->domicilio) && $adultomayor->domicilio == 'Alquilado' ? 'selected' : '' }}>Alquilado</option>
            <option value="Anticredito" {{ isset($adultomayor->domicilio) && $adultomayor->domicilio == 'Anticredito' ? 'selected' : '' }}>Anticredito</option>
            <option value="Cedido" {{ isset($adultomayor->domicilio) && $adultomayor->domicilio == 'Cedido' ? 'selected' : '' }}>Cedido</option>
            <option value="Familiar" {{ isset($adultomayor->domicilio) && $adultomayor->domicilio == 'Familiar' ? 'selected' : '' }}>Familiar</option>
            <option value="Arrendado" {{ isset($adultomayor->domicilio) && $adultomayor->domicilio == 'Arrendado' ? 'selected' : '' }}>Arrendado</option>
            <option value="Compartido" {{ isset($adultomayor->domicilio) && $adultomayor->domicilio == 'Compartido' ? 'selected' : '' }}>Compartido</option>
            <option value="Prestado" {{ isset($adultomayor->domicilio) && $adultomayor->domicilio == 'Prestado' ? 'selected' : '' }}>Prestado</option>
            <option value="Otros" {{ isset($adultomayor->domicilio) && $adultomayor->domicilio == 'Otros' ? 'selected' : '' }}>Otros</option>
        </select>
        {!! $errors->first('domicilio', '<p class="help-block">:message</p>') !!}
    </div>
</div>

    <div class="col-md-2">
        <div class="form-group {{ $errors->has('distrito') ? 'has-error' : ''}}">
            <label for="distrito" class="block font-medium text-sm text-gray-700"><i class="fas fa-street-view"></i> {{ 'Distrito' }}</label>
            <select class="form-control" id="distrito" name="distrito">
                <option value="" disabled selected>Selecciona un distrito</option>

                @for ($i = 1; $i <= 14; $i++)
                    <option value="{{ $i }}" {{ isset($adultomayor->distrito) && $adultomayor->distrito == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
            {!! $errors->first('distrito', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group {{ $errors->has('zona') ? 'has-error' : ''}}">
            <label for="zona" class="block font-medium text-sm text-gray-700"><i class="fas fa-map"></i> {{ 'Zona' }}</label>
            <input class="form-control" id="zona" name="zona" maxlength="30" type="text" value="{{ isset($adultomayor->zona) ? $adultomayor->zona : ''}}" >
            {!! $errors->first('zona', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group {{ $errors->has('calle') ? 'has-error' : ''}}">
            <label for="calle" class="block font-medium text-sm text-gray-700"><i class="fas fa-map-marked"></i> {{ 'Calle' }}</label>
            <input class="form-control" id="calle" name="calle" maxlength="25" type="text" value="{{ isset($adultomayor->calle) ? $adultomayor->calle : ''}}" >
            {!! $errors->first('calle', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group {{ $errors->has('nro') ? 'has-error' : ''}}">
            <label for="nro" class="block font-medium text-sm text-gray-700"><i class="fas fa-sort-numeric-up-alt"></i> {{ 'Nro' }}</label>
            <input class="form-control" id="nro" name="nro" type="number" maxlength="5" value="{{ isset($adultomayor->nro) ? $adultomayor->nro : ''}}" >
            {!! $errors->first('nro', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group {{ $errors->has('area') ? 'has-error' : ''}}">
            <label for="area" class="block font-medium text-sm text-gray-700"><i class="fas fa-thumbtack"></i> {{ 'Área' }}</label>
            <select class="form-control" required id="area" name="area">
                <option value="">Selecciona el área</option>
                <option value="Rural" {{ isset($adultomayor->area) && $adultomayor->area == 'Rural' ? 'selected' : '' }}>Área Rural</option>
                <option value="Urbana" {{ isset($adultomayor->area) && $adultomayor->area == 'Urbana' ? 'selected' : '' }}>Área Urbana</option>
            </select>
            {!! $errors->first('area', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">


    <div class="col-md-4">
        <div class="form-group {{ $errors->has('otro_municipio') ? 'has-error' : ''}}">
            <label for="otro_municipio" class="block font-medium text-sm text-gray-700"><i class="fas fa-globe-europe"></i> {{ 'Otro Municipio' }}</label>
            <input class="form-control" id="otro_municipio" maxlength="20" name="otro_municipio" type="text" value="{{ isset($adultomayor->otro_municipio) ? $adultomayor->otro_municipio : ''}}" >
            {!! $errors->first('otro_municipio', '<p class="help-block">:message</p>') !!}
        </div>
    </div>


</div>
</fieldset>

<fieldset class="border rounded-3 p-3">
            <legend class="float-none w-auto" >Datos familiares</legend>
            
     
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="cantidad_hijos" class="block font-medium text-sm text-gray-700"><i class="fas fa-child"></i> {{ 'Cantidad de hijos' }}</label>
            <select class="form-control" id="cantidad_hijos" name="cantidad_hijos">
                <option value="">Selecciona la cantidad de hijos</option>
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input[type="text"]');

            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    this.value = this.value.toUpperCase();
                });
            });
        });
    </script>

    <div id="hijos-container">
        <div class="form-group" style="margin-top: 0.5em">
            @for ($i = 1; $i <= 12; $i++)
            <div class="hijo-row" style="display: none;">
                <select class="form-control" name="parentesco[]">
                    <option value="" selected disabled>Selecciones parentesco</option>
                    <option value="hijo">Hijo</option>
                    <option value="hija">Hija</option>
                    <option value="hermano">Hermano</option>
                    <option value="hermana">Hermana</option>
                    <option value="tio">Tío</option>
                    <option value="tia">Tía</option>
                    <option value="primo">Primo</option>
                    <option value="prima">Prima</option>
                    <option value="sobrino">Sobrino</option>
                    <option value="sobrina">Sobrina</option>
                    <option value="cuñado">Cuñado</option>
                    <option value="cuñada">Cuñada</option>
                    <option value="nuero">Nuero</option>
                    <option value="nuera">Nuera</option>
                    <option value="esposo">Esposo</option>
                    <option value="esposa">Esposa</option>

                    <option value="amigo">Amigo</option>
                    <option value="amiga">Amiga</option>
                    <!-- Añade más opciones según sea necesario -->
                </select>
                <input type="text" name="nombre_completo[]" maxlength="35" class="form-control mb-2" placeholder="Ingrese nombre completo del hijo {{ $i }}">
                <input type="text" name="numero_telefono[]" class="form-control mb-2" placeholder="Ingrese número de teléfono del hijo {{ $i }}">
            </div>
            @endfor
        </div>
    </div>

</div>
</fieldset>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cantidadHijosSelect = document.getElementById('cantidad_hijos');
        const hijosRows = document.querySelectorAll('.hijo-row');

        cantidadHijosSelect.addEventListener('change', function() {
            const cantidadHijos = parseInt(cantidadHijosSelect.value);
            hijosRows.forEach((row, index) => {
                if (index < cantidadHijos) {
                    row.style.display = 'flex';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>
 <script>
    $(document).ready(function(){
        $('#nro_referencia').on('input', function(){
            var inputValue = $(this).val();
            if (!/^[0-9]*$/.test(inputValue)) {
                $('#error-nro_referencia').removeClass('d-none');
                $(this).val(inputValue.replace(/[^\d]/g, '')); // Eliminar caracteres no numéricos
            } else {
                $('#error-nro_referencia').addClass('d-none');
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('#nombres, #apellido_paterno, #apellido_materno').on('input', function(){
            var inputValue = $(this).val();
            var errorElement = $(this).next('.text-danger');
            var pattern = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/;
            if (!pattern.test(inputValue)) {
                errorElement.removeClass('d-none');
                $(this).val('');
            } else {
                errorElement.addClass('d-none');
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('#nro_referencia').on('input', function(){
            var inputValue = $(this).val();
            if (!/^[0-9]{1,8}$/.test(inputValue)) {
                $('#error-nro_referencia').removeClass('d-none');
            } else {
                $('#error-nro_referencia').addClass('d-none');
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('#ci').on('input', function(){
            var inputValue = $(this).val();
            if (!/^[0-9]{1,8}$/.test(inputValue)) {
                $('#error-ci').removeClass('d-none');
                $(this).val('');
            } else {
                $('#error-ci').addClass('d-none');
            }
        });
    });
</script>


<div class="form-group" style="float: right; margin-top:1em;">
    <input class="btn btn-info" style="float: right;" type="submit"
        value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
