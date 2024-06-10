<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="CasoExtravio"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-navbars.navs.auth titlePage="Nuevo registro "></x-navbars.navs.auth>

  <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card px-1">
                    <a href="{{ url('/admin/caso_extravio') }}" title="Back"><button class="btn btn-warning btn-sm m-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retornar</button></a>

                        <div class="card-body">

                            <form method="POST" action="{{ url('/admin/caso_extravio') }}" accept-charset="UTF-8" class="form-horizontal caso-extravio-form-zero" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                @include ('admin.caso_extravio.form', ['formMode' => 'create'])
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
