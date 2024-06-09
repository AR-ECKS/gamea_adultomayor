<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="CasoExtravio"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-navbars.navs.auth titlePage="Detalles del caso de extravio"></x-navbars.navs.auth>

        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <a href="{{ url('/admin/caso_extravio') }}" title="Back"><button class="btn btn-warning btn-sm m-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retornar</button></a>
                            <div class="m-auto ">Detalles del caso de extravio': </div>
                            <div class="m-auto"><h2> {{ $caso_extravio->id  }}</h2></div>
                        <div class="card-body">


                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="border px-8 py-2 font-bold"> Fecha </td>
                                            <td class="border px-8 py-2">
                                                {{ $caso_extravio->fecha }}
                                                <p class="price">{{ \Carbon\Carbon::parse($caso_extravio->fecha)->locale('es')->isoFormat('D \d\e MMMM \d\e YYYY') }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-8 py-2 font-bold"> Descripción </td>
                                            <td class="border px-8 py-2"> {{ $caso_extravio->descripcion }} </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-8 py-2 font-bold"> Otros </td>
                                            <td class="border px-8 py-2"> {{ $caso_extravio->otros }} </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-8 py-2 font-bold"> Detalles del adulto mayor </td>
                                            <td class="border px-2 py-2">
                                                <b>Nombres:</b> {{$caso_extravio->adulto_mayor->nombres}} <br>
                                                <b>Apellidos:</b> {{$caso_extravio->adulto_mayor->apellido_paterno}} {{$caso_extravio->adulto_mayor->apellido_materno}} <br>
                                                <b>CI:</b> {{$caso_extravio->adulto_mayor->ci}} {{$caso_extravio->adulto_mayor->extension}} <br>
                                                <b>Fecha de Nacimiento:</b> {{ \Carbon\Carbon::parse($caso_extravio->adulto_mayor->fecha_nacimiento)->locale('es')->isoFormat('D \d\e MMMM \d\e YYYY') }}
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
