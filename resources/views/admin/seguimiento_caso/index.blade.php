<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="Seguimiento"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-navbars.navs.auth titlePage="Seguimiento_caso"></x-navbars.navs.auth>
         @if (session()->has('correcto'))
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Operación Realizada con éxito",
                        showConfirmButton: false,
                        timer: 1000
                    });
                });
            </script>
        @endif

        @if (session()->has('error'))
            <script>
                $(document).ready(function() {
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
                            <a type="button" class="btn btn-dark" href="{{ route('seguimiento_caso.create') }}">
                                    <i class="fas fa-database"></i> Nuevo Seguimiento
                                </a>
                            </div>
                            <br><br><br>
                            <div class="tab-content">
                                <div class="table-responsive-xl">
                                    <table class="table table-sm text-sm table-striped">

                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th scope="col" class="px-6 py-3">Fecha</th><th scope="col" class="px-6 py-3">Tipologia</th><th scope="col" class="px-6 py-3">Descripcion</th>
                                        <th>Estado</th>
                                        <th class="text-end">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($seguimiento_caso as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4">{{ $item->fecha }}</td><td class="px-6 py-4">{{ $item->tipologia }}</td><td class="px-6 py-4">{{ $item->descripcion }}</td>
                                        <td>
                                            @if ($item->estado == 1)
                                                <span class="badge bg-warning">Activo</span>
                                            @else
                                                <span class="badge bg-danger">Inactivo</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            @if ( true/* $item->estado == 1 */)

                                            <a href="{{ route('seguimiento_caso.show', $item->id) }}"
                                                class="btn-sm btn-info" title="Ver detalles"> <i
                                                    class="far fa-eye"></i></a>
                                            <a href="{{ route('seguimiento_caso.edit', $item->id) }}"
                                                        class="btn-sm btn-secondary"> <i
                                                            class="fas fa-edit"></i></a>
                                            <form action="{{ route('seguimiento_caso.delete', $item->id) }}"
                                                                method="POST" style="display: inline-block;"
                                                                class="form-eliminar">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn-sm  btn-danger" type="submit"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Eliminar" rel="tooltip"
                                                                    style="padding: 0.2rem 0.9rem!important;">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                            @else
                                                            <a href="{{-- route('/admin/seguimiento_caso', $item->id) --}}"
                                                                class="btn-sm btn-dark" data-toggle="tooltip"
                                                                data-placement="top" title="Restaurar">
                                                                <i class="fas fa-undo"></i>
                                                            </a>
                                                        @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </div>
                    </div>



                </div>

            </div>
        </div>
    </div>
</div>
</div>


<script>
    $(document).ready(function() {

        $(".table").DataTable({
            lengthMenu: [10, 25, 50],
            order: [

                [3, "DESC"],
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
