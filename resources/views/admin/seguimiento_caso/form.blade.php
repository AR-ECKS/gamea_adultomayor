<div class="row">
    <div class="col-md-2">
        <label for="fecha" class="block font-medium text-sm text-gray-700">{{ 'Fecha' }}</label>
        <input class="form-control" id="fecha" name="fecha" type="date" value="{{ isset($seguimiento_caso->fecha) ? $seguimiento_caso->fecha : ''}}">
        {!! $errors->first('fecha', '<p>:message</p>') !!}
    </div>
    <div class="col-md-2">
        <label for="tipologia" class="block font-medium text-sm text-gray-700">{{ 'Tipologia' }}</label>
        <input class="form-control" id="tipologia" name="tipologia" type="text" value="{{ isset($seguimiento_caso->tipologia) ? $seguimiento_caso->tipologia : ''}}">
        {!! $errors->first('tipologia', '<p>:message</p>') !!}
    </div>
    <div class="col-md-3">

    </div>
    <div class="col-md-5">

    </div>
</div>

<div>
    <label for="descripcion" class="block font-medium text-sm text-gray-700">{{ 'Descripcion' }}</label>
    <textarea class="form-control" id="descripcion" name="descripcion" type="text" value="{{ isset($seguimiento_caso->descripcion) ? $seguimiento_caso->descripcion : ''}}"></textarea>
    {!! $errors->first('descripcion', '<p>:message</p>') !!}
</div>
<div>
    <label for="nombre_completo" class="block font-medium text-sm text-gray-700">{{ 'Nombre Completo' }}</label>
    <input class="form-control" id="nombre_completo" name="nombre_completo" type="text" value="{{ isset($seguimiento_caso->nombre_completo) ? $seguimiento_caso->nombre_completo : ''}}">
    {!! $errors->first('nombre_completo', '<p>:message</p>') !!}
</div>
<div>
    <label for="celular" class="block font-medium text-sm text-gray-700">{{ 'Celular' }}</label>
    <input class="form-control" id="celular" name="celular" type="text" value="{{ isset($seguimiento_caso->celular) ? $seguimiento_caso->celular : ''}}">
    {!! $errors->first('celular', '<p>:message</p>') !!}
</div>
<div>
    <label for="registroatencion_id" class="block font-medium text-sm text-gray-700">{{ 'Registroatencion Id' }}</label>
    <input class="form-control" id="registroatencion_id" name="registroatencion_id" type="number" value="{{ isset($seguimiento_caso->registroatencion_id) ? $seguimiento_caso->registroatencion_id : ''}}">
    {!! $errors->first('registroatencion_id', '<p>:message</p>') !!}
</div>


<div class="flex items-center gap-4">
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        {{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}
    </button>
</div>