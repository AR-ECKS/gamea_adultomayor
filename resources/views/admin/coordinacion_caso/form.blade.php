<div class="row">
    <div class="col-md-2">
        <div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
            <label for="fecha" class="block font-medium text-sm text-gray-700">{{ 'Fecha' }}</label>
            <input class="form-control" id="fecha" name="fecha" type="date" value="{{ isset($registroatencion->fecha) ? $registroatencion->fecha : date('Y-m-d') }}">
            {!! $errors->first('fecha', '<p>:message</p>') !!}
        </div>

    </div>
    

    <div class="col-md-4">
        <div>
            <label for="adultomayor_id" class="block font-medium text-sm text-gray-700">{{ 'Adulto Mayor' }}</label>
            <br>
            <select class="" id="adultomayor_id" name="adultomayor_id" data-maximum-selection-length="10">
                <option value="" disabled selected>Selecciona un Adulto Mayor</option>
                {{-- Itera solo una vez para cargar un solo dato --}}
                @foreach ($adultomayor->take(1) as $am)
                <option value="{{ $am->id }}" {{ isset($registroatencion->adultomayor_id) && $registroatencion->adultomayor_id == $am->id ? 'selected' : '' }}>
                    CI: {{ $am->ci }} Nombre: {{ $am->nombres }} {{ $am->apellido_paterno }}
                    {{ $am->apellido_materno }}
                </option>
                @endforeach
                {{-- Incluir el resto de los elementos --}}
                @foreach ($adultomayor->slice(1) as $am)
                <option value="{{ $am->id }}">
                    CI: {{ $am->ci }} Nombre: {{ $am->nombres }} {{ $am->apellido_paterno }}
                    {{ $am->apellido_materno }}
                </option>
                @endforeach
            </select>
            {!! $errors->first('adultomayor_id', '<p>:message</p>') !!}
        </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#adultomayor_id').change(function() {
            var adultomayor_id = $(this).val();
            console.log("Selected adultomayor_id: ", adultomayor_id); // Verificar el valor seleccionado
            if (adultomayor_id) {
                var url = '{{ route("getRegistroAtencionJson", ":id") }}'.replace(':id', adultomayor_id);
                console.log("Generated URL: ", url); // Verificar la URL generada
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log("Response data: ", data); // Verificar los datos de respuesta
                        if (data.error) {
                            alert(data.error);
                        } else {
                            console.log("nro_caso: ", data.nro_caso); // Verificar el valor de nro_caso
                            $('#nro').val(data.nro_caso); // Actualizar el campo del formulario
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("AJAX error: ", status, error); // Verificar cualquier error en la solicitud AJAX
                        console.log("XHR response: ", xhr.responseText); // Verificar el contenido de la respuesta
                        alert('Error al obtener los datos del registro de atención');
                    }
                });
            }
        });
    });
</script>

<div class="col-md-2">
    <label for="nro" class="block font-medium text-sm text-gray-700">{{ 'Nro de Caso' }}</label>
    <input class="form-control" disabled id="nro" name="nro_caso" type="text" maxlength="6" value="{{ isset($nro_caso) ? $nro_caso : '' }}">
    {!! $errors->first('nro', '<p class="help-block">:message</p>') !!}
</div>

    <div class="col-md-2">
        <label for="nro" class="block font-medium text-sm text-gray-700">{{ 'De:' }}</label>
        <input class="form-control" id="nro" name="area_origen" type="text" value="{{ isset($coordinacion_caso->area_origen) ? $coordinacion_caso->area_origen : ''}}">


    </div>
    <div class="col-md-2">
        <label for="nro" class="block font-medium text-sm text-gray-700">{{ 'A:' }}</label>
        <input class="form-control" id="nro" name="area_destino" type="text" value="{{ isset($coordinacion_caso->area_origen) ? $coordinacion_caso->area_origen : ''}}">


    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <label for="nro" class="block font-medium text-sm text-gray-700">{{ 'Intervencion que realiza:' }}</label>
        <textarea class="form-control" id="nro" name="intervencion" type="text" value="{{ isset($coordinacion_caso->intervencion) ? $coordinacion_caso->intervencion : ''}}">
        </textarea>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <label for="nro" class="block font-medium text-sm text-gray-700">{{ 'REQUERIMIENTO Y/O SUGERENCIA:' }}</label>
        <textarea class="form-control" id="nro"  name="requerimiento" type="text" value="{{ isset($coordinacion_caso->requerimiento) ? $coordinacion_caso->requerimiento : ''}}">
        </textarea>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        $('#adultomayor_id').select2({
            width: "100%",
            language: {
                noResults: function() {
                    return '<button id="mostrar" class="btn btn-success btn-sm" onclick="noResultsButtonClicked()">No existe, Cree el cliente</button>';
                },
            },
            escapeMarkup: function(markup) {
                return markup;
            },
            tags: true,
            maximumSelectionLength: 1 // Limita la selección a una sola opción
        });
    });
</script>
<div class="row">

</div>

<div class="form-group" style="float: right; margin-top:1em;">
    <input class="btn btn-info" style="float: right;" type="submit"
        value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
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