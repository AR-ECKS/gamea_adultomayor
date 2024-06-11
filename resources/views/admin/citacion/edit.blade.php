<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="Citaciones"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-navbars.navs.auth titlePage="Editar Registro "></x-navbars.navs.auth>

  <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card px-1">
                    <a href="{{ url('/admin/citacion') }}" title="Back"><button class="btn btn-warning btn-sm m-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retornar</button></a>
                    <div class="m-auto">Editar citación: </div>
                    <div class="m-auto"><h2> {{ $citacion->id }}</h3></div>

                        <div class="card-body">

                            <form method="POST" action="{{ url('/admin/citacion/'. $citacion->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}

                                @include ('admin.citacion.form', ['formMode' => 'edit'])
                            </form>
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