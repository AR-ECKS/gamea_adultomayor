<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="Registroatencion"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-navbars.navs.auth titlePage="Registroatencion"></x-navbars.navs.auth>

        <div class="container">
            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <a href="{{ url('/admin/registroatencion') }}" title="Back"><button
                                class="btn btn-warning btn-sm m-2"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Retornar</button></a>
                        <div class="m-auto ">Detalles del resgitro de atención : </div>
                        <div class="m-auto">
                            <h2> {{ $registroatencion->nro_caso }}</h3>
                        </div>
                        <div class="card-body">


                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>

                                        <tr>
                                            <td> Fecha </td>
                                            <td> {{ $registroatencion->fecha }} </td>
                                        </tr>
                                        <tr>
                                            <td> Tipologia </td>
                                            <td> {{ $registroatencion->tipologia }} </td>
                                        </tr>
                                        <tr>
                                            <td> Nro Caso </td>
                                            <td> {{ $registroatencion->nro_caso }} </td>
                                        </tr>
                                        <tr>
                                            <td> Descripcion </td>
                                            <td> {{ $registroatencion->descripcion }} </td>
                                        </tr>
                                        <tr>
                                            <td>Petición </td>
                                            <td> {{ $registroatencion->peticion }} </td>
                                        </tr>
                                        <tr>
                                            <td> Nombres denunciado </td>
                                            <td> {{ $registroatencion->nombres_denunciado }} </td>
                                        </tr>

                                        <tr>
                                            <td> Acciones Realizadas</td>
                                            <td> {{ $registroatencion->acciones }} </td>
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
