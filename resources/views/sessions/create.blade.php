<x-layout bodyClass="bg-warning-800">
    <main class="main-content mt-0">
        
        <div class="page-header align-items-start min-vh-100" style="background-image: url('https://cdn.pixabay.com/photo/2021/12/19/12/27/road-6881040_1280.jpg');">
            <span class="mask bg-gradient-dark opacity-7"></span>
            <div class="container m-auto">
                <div class="card bg-gradient-light">
                    <div class="card-body">
                        <div class="row p-1">
                            <!-- Primera columna -->
                            <div class="col-lg-6 col-md-12 m-auto">
                                <div class="card z-index-0 fadeIn3 fadeInBottom">
                                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                        <div class="bg-gradient-danger shadow-dark border-radius-lg py-3 pe-1">
                                            <h4 class="text-white font-weight-bolder text-center ">INICIAR SESION</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form role="form" method="POST" action="{{ route('login') }}" class="text-start">
                                            <!-- Contenido del primer formulario ... -->
                                            @csrf
                                            @if (Session::has('status'))
                                            <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                                <span class="text-sm">{{ Session::get('status') }}</span>
                                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @endif
                                            <div class="input-group input-group-outline mt-3">
                                                <label class="form-label">USUARIO</label>
                                                <input type="email" class="form-control" name="email" value="">
                                            </div>
                                            @error('email')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                            <div class="input-group input-group-outline mt-3">
                                                <label class="form-label">CONTRASEÑA</label>
                                                <input type="password" class="form-control" name="password" value=''>
                                            </div>
                                            @error('password')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror <div class="form-group mb-3">
                              <strong>Google recaptcha :</strong>
                   
                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn bg-gradient-danger mt-5">INGRESAR</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Segunda columna con imagen -->
                            <div class="col-lg-6 col-md-12">
                                <div class="card z-index-0 fadeIn3 fadeInBottom">
                                    <!-- Puedes agregar aquí cualquier contenido HTML o la imagen que desees -->
                                    <img src="https://yt3.googleusercontent.com/ytc/AIf8zZSkjd11HlOXPjuztQGSJyTzP7vI7TWU4tqYJrt4Lw=s900-c-k-c0x00ffffff-no-rj" class="img-fluid" alt="Imagen">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-footers.guest></x-footers.guest>
        </div>
    </main>
    @push('js')
    <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
    <script>
        $(function() {

            var text_val = $(".input-group input").val();
            if (text_val === "") {
                $(".input-group").removeClass('is-filled');
            } else {
                $(".input-group").addClass('is-filled');
            }
        });
    </script>
    @endpush
</x-layout>