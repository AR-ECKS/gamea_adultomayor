<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="Denunciados"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-navbars.navs.auth titlePage="Denunciados"></x-navbars.navs.auth>

      <div class="container">
            <div class="row">


                <div class="col-md-12">
                <div class="card">
                      <a href="{{ url('/admin/denunciados') }}" title="Back"><button class="btn btn-warning btn-sm m-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retornar</button></a>
                         <div class="m-auto ">Detalles de la '/admin/denunciados': </div>
                          <div class="m-auto"><h2> {{ $denunciado->id  }}</h3></div>
                     <div class="card-body">


                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $denunciado->id }}</td>
                                    </tr>
                                    <tr><td class="border px-8 py-4 font-bold"> Nombre Completo </td><td class="border px-8 py-4"> {{ $denunciado->nombre_completo }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Adultomayor Id </td><td class="border px-8 py-4"> {{ $denunciado->adultomayor_id }} </td></tr>

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
