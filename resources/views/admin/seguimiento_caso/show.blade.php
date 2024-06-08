<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="Seguimiento"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-navbars.navs.auth titlePage="Seguimiento_caso"></x-navbars.navs.auth>

      <div class="container">
            <div class="row">


                <div class="col-md-12">
                <div class="card">
                      <a href="{{ url('/admin/seguimiento_caso') }}" title="Back"><button class="btn btn-warning btn-sm m-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retornar</button></a>
                         <div class="m-auto ">Detalles de la {{ $seguimiento_caso->tipologia  }} </div>
                          <div class="m-auto"><h2> {{ $seguimiento_caso->id  }}</h3></div>
                     <div class="card-body">


                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $seguimiento_caso->id }}</td>
                                    </tr>
                                    <tr><td class="border px-8 py-4 font-bold"> Fecha </td><td class="border px-8 py-4"> {{ $seguimiento_caso->fecha }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Tipologia </td><td class="border px-8 py-4"> {{ $seguimiento_caso->tipologia }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Descripcion </td><td class="border px-8 py-4"> {{ $seguimiento_caso->descripcion }} </td></tr>

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
