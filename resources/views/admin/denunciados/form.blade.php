<div>
    <label for="nombre_completo" class="block font-medium text-sm text-gray-700">{{ 'Nombre Completo' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="nombre_completo" name="nombre_completo" type="text" value="{{ isset($denunciado->nombre_completo) ? $denunciado->nombre_completo : ''}}" >
    {!! $errors->first('nombre_completo', '<p>:message</p>') !!}
</div>
<div>
    <label for="adultomayor_id" class="block font-medium text-sm text-gray-700">{{ 'Adultomayor Id' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="adultomayor_id" name="adultomayor_id" type="number" value="{{ isset($denunciado->adultomayor_id) ? $denunciado->adultomayor_id : ''}}" >
    {!! $errors->first('adultomayor_id', '<p>:message</p>') !!}
</div>


<div class="flex items-center gap-4">
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        {{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}
    </button>
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
