<div class="row">
    <div class="col-md-2">
        <label for="fecha" class="block font-medium text-sm text-gray-700">{{ 'Fecha' }}</label>
        <input class="form-control" id="fecha" name="fecha" type="date" value="{{ isset($seguimiento_caso->fecha) ? $seguimiento_caso->fecha : ''}}" required>
        {!! $errors->first('fecha', '<p class="text-danger">:message</p>') !!}
    </div>
  
    <div class="col-md-6">
    <div>
    <label for="registroatencion_id" class="block font-medium text-sm text-gray-700">{{ 'Registroatencion Id' }}</label>
    <select class="" id="registroatencion_id" name="registroatencion_id" data-maximum-selection-length="10" required>
        <option value="" disabled selected>Selecciona un registro de atención</option>
        @foreach ($registros as $elemento_registro)
            <option value="{{ $elemento_registro->id }}"
                {{ isset($seguimiento_caso->registroatencion_id) && $seguimiento_caso->registroatencion_id == $elemento_registro->id ? 'selected' : '' }}>
                Fecha: {{ $elemento_registro->fecha }} .:: TIpología: {{ $elemento_registro->tipologia }}  .:: Nro. Caso: {{ $elemento_registro->nro_caso }}
            </option>
        @endforeach
    </select>
    {!! $errors->first('registroatencion_id', '<p class="text-danger">:message</p>') !!}
</div>
    </div>
    <!-- <div class="col-md-5">

    </div> -->
</div>
<script>
    $(document).ready(function() {
        $('#registroatencion_id').select2({
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

<div>
    <label for="descripcion" class="block font-medium text-sm text-gray-700">{{ 'Descripcion' }}</label>
    <textarea class="form-control" id="descripcion" name="descripcion" type="text" required>{{ isset($seguimiento_caso->descripcion) ? $seguimiento_caso->descripcion : ''}}</textarea>
    {!! $errors->first('descripcion', '<p class="text-danger">:message</p>') !!}
</div>
<div>
    <label for="nombre_completo" class="block font-medium text-sm text-gray-700">{{ 'Nombre Completo' }}</label>
    <input class="form-control" id="nombre_completo" name="nombre_completo" type="text" value="{{ isset($seguimiento_caso->nombre_completo) ? $seguimiento_caso->nombre_completo : ''}}" required>
    {!! $errors->first('nombre_completo', '<p class="text-danger">:message</p>') !!}
</div>
<div>
    <label for="celular" class="block font-medium text-sm text-gray-700">{{ 'Celular' }}</label>
    <input class="form-control" id="celular" name="celular" type="text" value="{{ isset($seguimiento_caso->celular) ? $seguimiento_caso->celular : ''}}" required>
    {!! $errors->first('celular', '<p class="text-danger">:message</p>') !!}
</div>

<div class="form-group" style="float: right; margin-top:1em;">
    <input class="btn btn-info" style="float: right;" type="submit"
        value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
