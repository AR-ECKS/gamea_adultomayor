<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="Adultomayor"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-navbars.navs.auth titlePage="Adultomayor"></x-navbars.navs.auth>

        <div class="container">
            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <a href="{{ url('/admin/adulto-mayor') }}" title="Back"><button
                                class="btn btn-warning btn-sm m-2"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Retornar</button></a>
                        <div class="m-auto ">Detalles del Adulto Mayor: </div>
                        <div class="m-auto">
                            <h2> {{ $adultomayor->nombres }} {{ $adultomayor->apellido_paterno }}
                                {{ $adultomayor->apellido_materno }}</h3>
                        </div>
                        <div class="card-body">


                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <td>{{ $adultomayor->id }}</td>
                                        </tr>
                                        <tr>
                                            <td> Nombre Completo </td>
                                            <td> {{ $adultomayor->nombres }} {{ $adultomayor->apellido_paterno }}
                                                {{ $adultomayor->apellido_materno }} </td>
                                        </tr>
                                        <tr>
                                            <td> Carnet de Identidad </td>
                                            <td> {{ $adultomayor->ci }} {{ $adultomayor->complemento }}  {{ $adultomayor->extension }}</td>
                                        </tr>

                                        <tr>
                                            <td> Fecha de naciento </td>
                                            <td> {{ $adultomayor->fecha_nacimiento }} </td>
                                        </tr>
                                        <?php
                                        // Obtener la fecha de nacimiento del adulto mayor desde $adultomayor->fecha_nacimiento
                                        $fechaNacimiento = new DateTime($adultomayor->fecha_nacimiento);

                                        // Obtener la fecha actual
                                        $fechaActual = new DateTime();

                                        // Calcular la diferencia entre las dos fechas
                                        $diferencia = $fechaNacimiento->diff($fechaActual);

                                        // Obtener la edad en años
                                        $edad = $diferencia->y;

                                        ?>

                                        <tr>
                                            <td>Edad: </td>
                                            <td> {{ $edad }} años </td>
                                        </tr>

                                        <tr>
                                            <td>Número de telefono: </td>
                                            <td>  {{ $adultomayor->nro_referencia }} </td>
                                        </tr>
                                        <tr>
                                            <td>Estado Civil: </td>
                                            <td>  {{ $adultomayor->estado_civil }} </td>
                                        </tr>
                                        <tr>
                                            <td>Grado instrucción: </td>
                                            <td>  {{ $adultomayor->grado_instruccion }} </td>
                                        </tr>
                                        <tr>
                                            <td>Ocupacion: </td>
                                            <td>  {{ $adultomayor->ocupacion }} </td>
                                        </tr>
                                        <tr>
                                            <td>Número de referencia: </td>
                                            <td>  {{ $adultomayor->nro_referencia }} </td>
                                        </tr>
                                        <tr>
                                            <td>Situación: </td>
                                            <td>  {{ $adultomayor->situacion }} </td>
                                        </tr>
                                        <tr class="m-auto">
                                            <td><h3>Datos de Vivienda</h3></td>
                                        </tr>
                                        <tr>
                                            <td>domicilio: </td>
                                            <td>  {{ $adultomayor->domicilio }} </td>
                                        </tr>
                                        <tr>
                                            <td>Distrito: </td>
                                            <td>  {{ $adultomayor->distrito }} </td>
                                        </tr>
                                        <tr>
                                            <td>Zona: </td>
                                            <td>  {{ $adultomayor->zona }} </td>
                                        </tr>
                                        <tr>
                                            <td>Calle: </td>
                                            <td>  {{ $adultomayor->calle }} </td>
                                        </tr>
                                        <tr>
                                            <td>N°: </td>
                                            <td>  {{ $adultomayor->nro }} </td>
                                        </tr>
                                        <tr>
                                            <td>Area: </td>
                                            <td>  {{ $adultomayor->area }} </td>
                                        </tr>
                                        <tr class="m-auto">
                                            <td><h3>Datos familiares</h3></td>
                                        </tr>
                                        <tr>
                                            <td>Cantidad de Hijos: </td>
                                            <td>  {{ $adultomayor->cantidad_hijos }} </td>
                                        </tr>
                                        <tr>
                                            <td>Hijos:</td>
                                            <td>
                                                @foreach($hijos as $hijo)
                                                    Nombre completo: {{$hijo->nombre_completo}} <br>
                                                    Parentesco: {{$hijo->parentesco}} <br>
                                                    Teléfono: {{$hijo->telefono}} <br><br>
                                                @endforeach
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>
