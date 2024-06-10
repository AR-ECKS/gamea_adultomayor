<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage="usuarios"></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Usuarios"></x-navbars.navs.auth>

@if (session()->has('correcto'))
<script>
$(document).ready(function(){
    Swal.fire({
        position: "center",
        icon: "success",
        title: "Operación Realizada con éxito",
        showConfirmButton: false,
        timer: 1500
    });
});
</script>
@endif

@if (session()->has('error'))
<script>
$(document).ready(function(){
    Swal.fire({
        position: "center",
        icon: "error",
        title: "ocurrio un error",
        showConfirmButton: false,
        timer: 1500
    });
});
</script>
@endif


    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2 ">

            </div>
            <div class="card-body p-3">
              <div class="float-end mt-3">
                <a type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class="fas fa-database"></i> Nuevo Usuario
                </a>
              </div>
              <br><br><br>
              <div class="tab-content">
                <div class="table-responsive-xl">
                  
                  <table class="table table-sm text-sm table-striped">
                    <thead class="">
                        <th     >Acciones</th>

                      <th>#</th>

                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Nombre de usuario</th>
                      <th>Roles</th>
                      <th>Estado</th>
                    </thead>
                    <tbody>

                      @foreach ($users as $user)
                      <tr>
                        <td class="">
                            @if($user->estado == 1)
                            <a href="#" class="btn-sm btn-info" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#showModal{{$user->id}}" data-placement="top" title="Ver detalles"> <i class="far fa-eye"></i></a>
                            <a href="#" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#editModal{{$user->id}}" data-placement="top" title="Editar" class="btn-sm btn-secondary"> <i class="fas fa-edit"></i></a>



                            <form action="{{ route('users.delete', $user->id) }}" method="POST" style="display: inline-block;" class="form-eliminar">
                              @csrf
                              @method('DELETE')
                              <button class="btn-sm  btn-danger" type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" rel="tooltip" style="padding: 0.2rem 0.9rem!important;">
                                <i class="fas fa-trash"></i>
                              </button>
                            </form>
                            @else
                            <a href="{{ route('users.reingresar', $user->id) }}" class="btn-sm btn-dark" data-toggle="tooltip" data-placement="top" title="Restaurar">
                              <i class="fas fa-undo"></i>
                            </a>
                            @endif

                          </td>
                        <td>{{ $loop->iteration }}</td>


                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->username }}</td>
                        <td> @forelse ($user->roles as $role)
                          <span class="badge rounded-pill bg-dark text-white">{{ $role->name }}</span>
                          @empty
                          <span class="badge badge-danger bg-danger">No roles</span>
                          @endforelse
                        </td>
                        </td>
                        <td>
                          @if($user->estado == 1)
                          <span class="badge bg-warning">Activo</span>
                          @else
                          <span class="badge bg-danger">Inactivo</span>
                          @endif
                        </td>

                        @include('users.edit')
                        @include('users.show')
                      </tr>
                      @endforeach
                    </tbody>
                  </table>


                </div>
              </div>



            </div>

          </div>
        </div>
      </div>
    </div>
    </div>
    </div>



    @include ('users.create')



    <script>
      $(document).ready(function() {

        $(".table").DataTable({
          lengthMenu: [10, 25, 50],
          order: [

            [0, "asc"],
          ],
          language: {
            decimal: "",
            emptyTable: "No hay datos",
            info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
            infoEmpty: "Mostrando 0 a 0 de 0 registros",
            infoFiltered: "(Filtro de _MAX_ total registros)",
            infoPostFix: "",
            thousands: ",",
            lengthMenu: "Mostrar _MENU_ registros",
            loadingRecords: "Cargando...",
            processing: "Procesando...",
            search: "Buscar:",
            zeroRecords: "No se encontraron coincidencias",

            paginate: {
              first: '<i class="fas fa-angle-double-left"></i>',
              last: '<i class="fas fa-angle-double-right"></i>',
              next: '<i class="fas fa-angle-right"></i>',
              previous: '<i class="fas fa-angle-left"></i>',
            },
            aria: {
              sortAscending: ": Activar orden de columna ascendente",
              sortDescending: ": Activar orden de columna desendente",
            },
          },

        });
      });
    </script>

    <x-footers.auth></x-footers.auth>
    </div>
  </main>
  <x-plugins></x-plugins>

</x-layout>
