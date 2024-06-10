@push('my_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" integrity="sha512-hvNR0F/e2J7zPPfLC9auFe3/SE0yG4aJCOd/qxew74NN7eyiSKjr7xJJMu1Jy2wf7FXITpWS1E/RY8yzuXN7VA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

<div class="row">
    <div class="col-md-9 row">
        <div class="col-md-3">
            <div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
                <label for="fecha" class="block font-medium text-sm text-gray-700">{{ 'Fecha' }}</label>
                <input class="form-control" id="fecha" name="fecha" type="date" value="{{ isset($caso_extravio->fecha) ? $caso_extravio->fecha : date('Y-m-d') }}">
                {!! $errors->first('fecha', '<p class="text-danger">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-9 form-group">
            <label for="adultomayor_id" class="block font-medium text-sm text-gray-700">{{ 'Adulto Mayor' }}</label>
            <br>
            <select class="form-select" id="adultomayor_id" name="adultomayor_id" data-maximum-selection-length="10">
                <option value="" disabled selected required>Selecciona un Adulto Mayor</option>
                
                @foreach($adultos_mayores as $am)
                    <option value="{{ $am->id }}" {{ isset($caso_extravio->adultomayor_id) && $caso_extravio->adultomayor_id == $am->id ? 'selected' : '' }}>
                        CI: {{ $am->ci }} .:: Nombre: {{ $am->nombres }} {{ $am->apellido_paterno }}
                        {{ $am->apellido_materno }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('adultomayor_id', '<p class="text-danger">:message</p>') !!}
        </div>

        <div class="col-md-12 form-group">
            <label for="otros" class="block font-medium text-sm text-gray-700">{{ 'Otros' }}</label>
            <br>
            <input class="form-control" id="otros" name="otros" type="text" value="{{ isset($caso_extravio->otros) ? $caso_extravio->otros : ''}}">
            {!! $errors->first('otros', '<p class="text-danger">:message</p>') !!}
        </div>

        <div class="col-md-12">
            <label for="descripcion" class="block font-medium text-sm text-gray-700">{{ 'Descripción:' }}</label>
            <textarea class="form-control" id="descripcion" name="descripcion" type="text" required>{{ isset($caso_extravio->descripcion) ? $caso_extravio->descripcion : ''}}</textarea>
            {!! $errors->first('descripcion', '<p class="text-danger">:message</p>') !!}
        </div>

    </div>

    <div class="col-md-3">
        <label for="ruta_imagen" class="block font-medium text-sm text-gray-700">{{ 'Imagen:' }}</label>
        <input class="form-control" id="ruta_imagen" name="ruta_imagen" type="file" accept="image/png,image/jpeg">
        {!! $errors->first('ruta_imagen', '<p class="text-danger">:message</p>') !!}
        <div class="w-100 bg-info text-white rounded-1 text-center mt-1">Vista previa</div>
        <div class="img-container">
            <img id="imagePreview" src="{{ isset($caso_extravio->url_imagen) ? $caso_extravio->url_imagen : ''}}" alt="Picture" class="img-thumbnail w-100 d-block mx-auto">
        </div>
        <input class="form-control d-none" id="imagen" name="imagen" type="text">
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
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js" integrity="sha512-9KkIqdfN7ipEW6B6k+Aq20PV31bjODg4AA52W+tYtAE0jE0kMx49bjJ3FgvS56wzmyfMUHbQ4Km2b7l9+Y/+Eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('.caso-extravio-form-zero'); //#createCasoExtravio

        var input = document.querySelector('#ruta_imagen');
        var image = document.querySelector('#imagePreview');
        var cropper;

        input.addEventListener('change', function (e) {
            //console.log('Se detecto cambios');
            const file = e.target.files[0];
            if(validarExtension(file)) {
                if(file.size/1024 <= {{$OPTIONS_IMAGE['max_size']}}){
                    //console.log('Correcto');
                    // si la imagen se carga ir a image.onload
                    image.src = URL.createObjectURL(file);
                } else {
                    Swal.fire({
                        title: "Error",
                        text: "La imagen no debe superar los "+ ({{$OPTIONS_IMAGE['max_size']}}/1024) +'MB.',
                        icon: "error"
                    });
                }
            } else {
                Swal.fire({
                    title: "Error",
                    text: "Debe ser una imagen",
                    icon: "error"
                });
            }
        });

        form.addEventListener('submit', (event) => {
            event.preventDefault();
            document.querySelector('#imagen').value = (cropper!==undefined)? cropper.getCroppedCanvas().toDataURL(): null;
            //console.log('Se detenio el envio');
            
            form.submit();
        });

        function validarExtension(datos) {
            const extensionesValidas = ".png, .gif, .jpeg, .jpg";
            const ruta = datos.name; //value
            const extension = ruta.substring(ruta.lastIndexOf('.') + 1).toLowerCase();
            const extensionValida = extensionesValidas.indexOf(extension);

            if(extensionValida < 0) {
                //$('#texto').text('La extensión no es válida Su fichero tiene de extensión: .'+ extension);
                return false;
            } else {
                return true;
            }
        }

        // Define una función que se ejecutará cuando la imagen se cargue
        image.onload = function() {
            console.log('SI');
            if(cropper!==undefined){
                cropper.destroy();
                cropper = undefined;
                console.log(cropper);
            }

            console.log(`La imagen se ha cargado completamente. Dimensiones: ${image.naturalWidth}x${image.naturalHeight}`);
            //console.log(`La imagen contenedor. Dimensiones: ${image.clientWidth}x${image.clientHeight}`);

            const width_container = image.clientWidth + 2;//cropper.containerData.width;

            const image_tamanio_minimo = {{$OPTIONS_IMAGE['min_width']}};
            let anchoMinimoCrop = image_tamanio_minimo;
            //console.log(width, '>=', image_tamanio_minimo);
            //console.log('Es', width >= image_tamanio_minimo);
            if(image.naturalWidth >= image_tamanio_minimo){
                anchoMinimoCrop = ( image_tamanio_minimo / image.naturalWidth) * width_container;
            }
            //console.log(width_container, 'min', anchoMinimoCrop);

            cropper = new Cropper(image, {
                aspectRatio: {{$OPTIONS_IMAGE['escale'][0]}} / {{$OPTIONS_IMAGE['escale'][1]}},
                viewMode: 3,
                minCropBoxWidth: anchoMinimoCrop, // ancho minimo del encuadre
                zoomOnWheel: false,
                ready: function (event) {
                    // load successfully
                },
                /* crop: function (event){
                    console.log(`Width: ${event.detail.width}`);
                    console.log(`Height: ${event.detail.height}`);
                } */
            });
        };

        // cuando ocurra un error se ejecutara
        imgElement.onerror = function() {
            console.log('Hubo un error al cargar la imagen.');
        };

        
        /* form.addEventListener('click', (e) => {
            e.preventDefault()
            console.log('Se detenio el envio');
        }); */

    });
    </script>
@endpush