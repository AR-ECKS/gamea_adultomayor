<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="Coordinacion_caso"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-navbars.navs.auth titlePage="Coordinacion_caso"></x-navbars.navs.auth>

      <div class="container">
            <div class="row">


                <div class="col-md-12">
                <div class="card">
                      <a href="{{ url('/admin/coordinacion_caso') }}" title="Back"><button class="btn btn-warning btn-sm m-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retornar</button></a>
                         <div class="m-auto ">Detalles de la coordinacion: </div>
                          <div class="m-auto"><h2> {{ $coordinacion_caso->id  }}</h3></div>
                     <div class="card-body">


                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $coordinacion_caso->id }}</td>
                                    </tr>
                                    <tr><td class="border px-8 py-4 font-bold"> Fecha </td><td class="border px-8 py-4"> {{ $coordinacion_caso->fecha }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Intervencion </td><td class="border px-8 py-4"> {{ $coordinacion_caso->intervencion }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Requerimiento </td><td class="border px-8 py-4"> {{ $coordinacion_caso->requerimiento }} </td></tr>

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
