<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="Citaciones"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-navbars.navs.auth titlePage="Detalles de la citación"></x-navbars.navs.auth>

      <div class="container">
            <div class="row">


                <div class="col-md-12">
                <div class="card">
                      <a href="{{ url('/admin/citacion') }}" title="Back"><button class="btn btn-warning btn-sm m-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retornar</button></a>
                         <div class="m-auto ">Detalles de la citación </div>
                          <div class="m-auto"><h2> {{ $citacion->id  }}</h3></div>
                     <div class="card-body">


                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="max-width: 300px">ID</th>
                                        <td class="px-4 py-4">{{ $citacion->id }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border px-4 py-4 font-bold"> Fecha </td>
                                        <td class="border px-4 py-4"> {{ \Carbon\Carbon::parse($citacion->fecha)->locale('es')->isoFormat('D \d\e MMMM \d\e YYYY') }} </td>
                                    </tr>
                                    <tr>
                                        <td class="border px-4 py-4 font-bold"> Número de citación </td>
                                        <td class="border px-4 py-4"> {{ $citacion->numero_citacion }} </td>
                                    </tr>
                                    <tr>
                                        <td class="border px-4 py-4 font-bold"> Tipologia </td>
                                        <td class="border px-4 py-4"> {{ $citacion->tipologia }} </td>
                                    </tr>
                                    <tr>
                                        <td class="border px-4 py-4 font-bold"> Citados </td>
                                        <td class="border px-4 py-4"> {{ $citacion->citados }} </td>
                                    </tr>
                                    <tr>
                                        <td class="border px-4 py-4 font-bold"> Descripcion </td>
                                        <td class="border px-4 py-4"> {{ $citacion->descripcion }} </td>
                                    </tr>
                                    <tr>
                                        <td class="border px-4 py-4 font-bold"> Registro de atención </td>
                                        <td class="border px-4 py-4">
                                            <b>Fecha</b> {{$citacion->registro_de_atencion->fecha}} <br>
                                            <b>Tipología</b> {{$citacion->registro_de_atencion->tipologia}} <br>
                                            <b>Número de caso</b> {{$citacion->registro_de_atencion->nro_caso}} <br>
                                            <b>Petición</b> {{$citacion->registro_de_atencion->peticion}} <br>
                                            <b>Nombres Denunciado</b> {{$citacion->registro_de_atencion->nombres_denunciado}} <br>
                                            <b>Acciones</b> {{$citacion->registro_de_atencion->acciones}} <br>
                                            <b>Descripción</b> {{$citacion->registro_de_atencion->descripcion}} <br>
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
