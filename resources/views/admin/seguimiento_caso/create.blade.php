<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="Seguimiento"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-navbars.navs.auth titlePage="Nuevo registro "></x-navbars.navs.auth>

  <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card px-1">


                          <div class="card-body">

                        <form method="POST" action="{{ url('/admin/seguimiento_caso') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.seguimiento_caso.form', ['formMode' => 'create'])

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

