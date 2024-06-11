@props(['titlePage'])

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-light" href="javascript:;">Sistema</a></li>
                <li class="breadcrumb-item text-sm text-light active" aria-current="page">{{ $titlePage }}</li>
            </ol>
            <h6 class="font-weight-bolder mb-0 text-light">{{ $titlePage }}</h6>
        </nav> 
        <div class="dropdown mt-2">
            <button class="btn btn-outline-transparent p-1 dropdown-toggle text-white fs-5" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://img.icons8.com/ios-filled/50/test-account.png" alt="foto de perfil" class="rounded img-fluid rounded-circle" width="35px" height="35px">
            </button>
            <ul class="dropdown-menu dropdown-menu-end" style="width: 200px">
              <li>
                <img src="https://www.elalto.gob.bo/wp-content/uploads/2022/09/logos-modificados-final_Mesa-de-trabajo-1-e1663342902218.png" alt="" class="img-fluid">
              </li>
              <li class="px-4 py-2">
                <b>Usuario:</b> {{ Auth::user()->name }}<br>
                <b>Rol:</b> 
                    @forelse (Auth::user()->roles as $role)
                        <span>{{ $role->name }}</span> 
                    @empty
                        <span class="badge badge-danger bg-danger">Sin rol</span>
                    @endforelse
              </li>
              <li class="d-flex justify-content-center">
                <form method="POST" action="{{ route('logout') }}" class="d-none" id="logout-form">
                    @csrf
                </form>
                <a href="javascript:;" class="btn btn-primary ">
                    <span class="d-sm-inline d-none text-light font-weight-bold" 
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar Sesión</span>
                </a>
              </li>
            </ul>
          </div>
        {{-- <div class="collapse navbar-collapse bg-danger" id="navbar" >
           
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 profile-menu position-fixed" style="z-index: 9999 !important;"> 
                <li class="nav-item bg-primary dropstart dropdown d-flex flex-row"> 
                  <a class="nav-link dropdown-toggle d-block" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="profile-pic">
                        <img src="https://img.icons8.com/ios-filled/50/test-account.png" alt="Profile Picture" width="35px" height="35px">
                     </div>
                 <!-- You can also use icon as follows: -->
                   <!--  <i class="fas fa-user"></i> -->
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="position:absolute!important;right:0!important;">
                    <li><a class="dropdown-item" href="#"><i class="fas fa-sliders-h fa-fw"></i> Account</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog fa-fw"></i> Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</a></li>
                  </ul>
                </li>
            </ul>
        </div> --}}
    </div>
</nav>
