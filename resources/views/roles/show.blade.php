<div class="modal fade bd-example-modal-xl" id="showModal{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content modal-blur">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white">Datos del rol {{$role->name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="author">
                            <h5 class="title">Nombre del rol: {{ $role->name }}</h5>
                        </div>
                        <p>
                        <div class="card-description text-dark">
                            Creado el: {{ $role->created_at }} <br><br>
                            Tiene los siguientes permisos: <br>
                            @forelse ($role->permissions as $permission)
                                <span class="badge bg-primary rounded-pill mb-2" style="font-size: 14px;">{{ $permission->name }}</span>
                            @empty
                                <span class="badge bg-danger">No permissions</span>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
