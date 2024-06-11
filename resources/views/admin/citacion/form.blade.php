<div class="row">
    <div class="col-md-2">
        <label for="fecha" class="block font-medium text-sm text-gray-700">{{ 'Fecha' }}</label>
        <input class="form-control" id="fecha" name="fecha" type="date" value="{{ isset($citacion->fecha) ? $citacion->fecha : ''}}" required>
        {!! $errors->first('fecha', '<p class="text-danger">:message</p>') !!}
    </div>
    <div class="col-md-4">
        <label for="tipologia" class="block font-medium text-sm text-gray-700">{{ 'Tipologia' }}</label>
        <input class="form-control" id="tipologia" name="tipologia" type="text" value="{{ isset($citacion->tipologia) ? $citacion->tipologia : ''}}" required>
        {!! $errors->first('tipologia', '<p class="text-danger">:message</p>') !!}
    </div>
    <div class="col-md-4">
        <label for="numero_citacion" class="block font-medium text-sm text-gray-700">{{ 'Número de citación' }}</label>
        <input class="form-control" id="numero_citacion" name="numero_citacion" type="text" value="{{ isset($citacion->numero_citacion) ? $citacion->numero_citacion : ''}}" required>
        {!! $errors->first('numero_citacion', '<p class="text-danger">:message</p>') !!}
    </div>
    <div class="col-md-5">

    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <label for="citados" class="block font-medium text-sm text-gray-700">{{ 'Citados' }}</label>
        <input class="form-control" id="citados" name="citados" type="text" value="{{ isset($citacion->citados) ? $citacion->citados : ''}}" required>
        {!! $errors->first('citados', '<p class="text-danger">:message</p>') !!}
    </div>
    <div class="col-md-6">
        <label for="citados" class="block font-medium text-sm text-gray-700">{{ 'Registro de atención' }}</label>
        <select class=" form-select" id="registro_atencion_id" name="registro_atencion_id" data-maximum-selection-length="10" required>
            <option value="" disabled selected>Selecciona un registro de atención</option>
            @foreach ($registros_atenciones as $elemento_registro)
                <option value="{{ $elemento_registro->id }}"
                    {{ isset($citacion->registro_atencion_id) && $citacion->registro_atencion_id == $elemento_registro->id ? 'selected' : '' }}>
                    Fecha: {{ $elemento_registro->fecha }} .:: TIpología: {{ $elemento_registro->tipologia }}  .:: Nro. Caso: {{ $elemento_registro->nro_caso }}
                </option>
            @endforeach
        </select>
        {!! $errors->first('registroatencion_id', '<p class="text-danger">:message</p>') !!}
    </div>
</div>

<div>
    <label for="descripcion" class="block font-medium text-sm text-gray-700">{{ 'Descripcion' }}</label>
    <textarea class="form-control" id="descripcion" name="descripcion" type="text" required>{{ isset($citacion->descripcion) ? $citacion->descripcion : ''}}</textarea>
    {!! $errors->first('descripcion', '<p class="text-danger">:message</p>') !!}
</div>

<div class="form-group" style="float: right; margin-top:1em;">
    <input class="btn btn-info" style="float: right;" type="submit"
        value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>