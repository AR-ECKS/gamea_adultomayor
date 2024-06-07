<div class="row">
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
            <label for="fecha" class="block font-medium text-sm text-gray-700">{{ 'Fecha' }}</label>
            <input class="form-control" id="fecha" name="fecha" type="date"
                value="{{ isset($registroatencion->fecha) ? $registroatencion->fecha : date('Y-m-d') }}" >
            {!! $errors->first('fecha', '<p>:message</p>') !!}
        </div>

    </div>
    <div class="col-md-4">
        <div>
            <label for="tipologia" class="block font-medium text-sm text-gray-700">{{ 'Tipologia' }}</label>
            <input class="form-control" id="tipologia" required name="tipologia" maxlength="15" type="text"
                value="{{ isset($registroatencion->tipologia) ? $registroatencion->tipologia : '' }}">
            {!! $errors->first('tipologia', '<p>:message</p>') !!}
        </div>
    </div>
    <div class="col-md-4">
        <div>
            <label for="nro" class="block font-medium text-sm text-gray-700">{{ 'Nro de Caso' }}</label>
            <input class="form-control" id="nro" name="nro_caso" type="text" maxlength="6"
                value="{{ isset($nro_caso) ? $nro_caso : '' }}" >
            {!! $errors->first('nro', '<p class="help-block">:message</p>') !!}
        </div>

    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div>
            <label for="adultomayor_id" class="block font-medium text-sm text-gray-700">{{ 'Adulto Mayor' }}</label>
            <br>
            <select class="" id="adultomayor_id" name="adultomayor_id" data-maximum-selection-length="10">
                <option value="" disabled selected>Selecciona un Adulto Mayor</option>
                {{-- Itera solo una vez para cargar un solo dato --}}
                @foreach ($adultomayor->take(1) as $am)
                    <option value="{{ $am->id }}"
                        {{ isset($registroatencion->adultomayor_id) && $registroatencion->adultomayor_id == $am->id ? 'selected' : '' }}>
                        CI: {{ $am->ci }} Nombre: {{ $am->nombres }} {{ $am->apellido_paterno }}
                        {{ $am->apellido_materno }}</option>
                @endforeach
                {{-- Incluir el resto de los elementos --}}
                @foreach ($adultomayor->slice(1) as $am)
                    <option value="{{ $am->id }}">
                        CI: {{ $am->ci }} Nombre: {{ $am->nombres }} {{ $am->apellido_paterno }}
                        {{ $am->apellido_materno }}</option>
                @endforeach
            </select>
            {!! $errors->first('adultomayor_id', '<p>:message</p>') !!}
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#adultomayor_id').select2({
            width: "100%",
            language: {
                noResults: function () {
                    return '<button id="mostrar" class="btn btn-success btn-sm" onclick="noResultsButtonClicked()">No existe, Cree el cliente</button>';
                },
            },
            escapeMarkup: function (markup) {
                return markup;
            },
            tags: true,
            maximumSelectionLength: 1 // Limita la selección a una sola opción
        });
    });


</script>


</script>
<div class="row">
    <div class="col-md-12">
        <div>
            <label for="descripcion" class="block font-medium text-sm text-gray-700">{{ 'Descripcion' }}</label>
            <textarea class="form-control" required id="descripcion" name="descripcion" rows="6  ">{{ isset($registroatencion->descripcion) ? $registroatencion->descripcion : '' }}</textarea>
            {!! $errors->first('descripcion', '<p>:message</p>') !!}
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div>
            <label for="peticion" class="block font-medium text-sm text-gray-700">{{ 'Peticion' }}</label>
            <input class="form-control" required id="peticion" name="peticion" type="text"
                value="{{ isset($registroatencion->peticion) ? $registroatencion->peticion : '' }}">
            {!! $errors->first('peticion', '<p>:message</p>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div>
            <label for="nombres_denunciado"
                class="block font-medium text-sm text-gray-700">{{ 'Nombres Denunciado' }}</label>
            <input class="form-control" required id="nombres_denunciado" name="nombres_denunciado" type="text"
                value="{{ isset($registroatencion->nombres_denunciado) ? $registroatencion->nombres_denunciado : '' }}">
            {!! $errors->first('nombres_denunciado', '<p>:message</p>') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div>
                <label for="acciones" class="block font-medium text-sm text-gray-700">{{ 'Acciones' }}</label>
                <input class="form-control" id="acciones" name="acciones" type="text" value="APERTURA CASO" disabled>
                {!! $errors->first('acciones', '<p>:message</p>') !!}
            </div>

        </div>
    </div>
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
