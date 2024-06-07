<div class="modal fade bd-example-modal-xl" id="editModal{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl " role="document">
        <div class="modal-content modal-blur">
            <div class="modal-header bg-success ">
                <h5 class="modal-title " id="exampleModalLabel" style="color:white">Editar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('roles.update', $role->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Nombre del rol:</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $role->name) }}" autocomplete="off" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Permisos:</label>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="row">
                                            @foreach ($permissions as $category => $categoryPermissions)
                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-header bg-primary text-white">
                                                        {{ $category }}
                                                    </div>
                                                    <div class="card-body">
                                                        @foreach ($categoryPermissions as $permission)
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="" type="checkbox" name="permissions[]" value="{{ $permission }}" {{ in_array($permission, $role->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                <span class="form-check-sign">
                                                                    <span class="check"></span>
                                                                </span>
                                                                {{ $permission }}
                                                            </label>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group float-right">
                                <button type="submit" class="btn btn-primary">Guardar Rol</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
