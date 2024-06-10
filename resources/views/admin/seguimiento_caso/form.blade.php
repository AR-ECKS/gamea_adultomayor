<div class="row">
    <div class="col-md-2">
        <label for="fecha" class="block font-medium text-sm text-gray-700">{{ 'Fecha' }}</label>
        <input class="form-control" id="fecha" name="fecha" type="date" value="{{ isset($seguimiento_caso->fecha) ? $seguimiento_caso->fecha : ''}}" required>
        {!! $errors->first('fecha', '<p class="text-danger">:message</p>') !!}
    </div>
    <div class="col-md-2">
        <label for="tipologia" class="block font-medium text-sm text-gray-700">{{ 'Tipologia' }}</label>
        <input class="form-control" id="tipologia" name="tipologia" type="text" value="{{ isset($seguimiento_caso->tipologia) ? $seguimiento_caso->tipologia : ''}}" required>
        {!! $errors->first('tipologia', '<p class="text-danger">:message</p>') !!}
    </div>
    <div class="col-md-3">

    </div>
    <div class="col-md-5">

    </div>
</div>

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


<div class="flex items-center gap-4">
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        {{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}
    </button>
</div>