<div class="modal fade bd-example-modal-lg" id="showModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content modal-blur">
      <div class="modal-header bg-success ">
        <h5 class="modal-title " id="exampleModalLabel" style="color:white">Datos de {{$user->name}}</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div class="author m-auto">
              <a href="#">
                @if (!empty($user->imagen))
                <img src="{{ asset('storage/'.$user->imagen) }}" class="rounded img-thumbnail" alt="Imagen">


                @else
                <p>No hay foto</p>
                @endif

              </a>
            </div>
          </div>
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-4">
                <strong>ID:</strong>
              </div>
              <div class="col-md-8">
                {{ $user->id }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-4">
                <strong>Nombre:</strong>
              </div>
              <div class="col-md-8">
                {{ $user->name }}
              </div>
            </div>    <hr>
            <div class="row">
                <div class="col-md-4">
                  <strong>CI:</strong>
                </div>
                <div class="col-md-8">
                  {{ $user->ci }}    {{ $user->extension }}
                </div>
              </div>    <hr>
              <div class="row">
                <div class="col-md-4">
                  <strong>Cargo:</strong>
                </div>
                <div class="col-md-8">
                  {{ $user->cargo }}
                </div>
              </div>    <hr>
            <div class="row">
              <div class="col-md-4">
                <strong>Email:</strong>
              </div>
              <div class="col-md-8">
                {{ $user->email }}
              </div>
            </div>    <hr>
            <div class="row">
              <div class="col-md-4">
                <strong>Nombre de Usuario:</strong>
              </div>
              <div class="col-md-8">
                {{ $user->username }}
              </div>
            </div>    <hr>
            <div class="row">
              <div class="col-md-4">
                <strong>Creado el:</strong>
              </div>
              <div class="col-md-8">
                <a href="#" target="_blank">{{ $user->created_at }}</a>
              </div>
            </div>    <hr>
            <div class="row">
              <div class="col-md-4">
                <strong>Roles:</strong>
              </div>
              <div class="col-md-8">
                @forelse ($user->roles as $role)
                <span class="badge rounded-pill bg-dark text-white">{{ $role->name }}</span>
                @empty
                <span class="badge badge-danger bg-danger">No roles</span>
                @endforelse
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>

  </div>
</div>
