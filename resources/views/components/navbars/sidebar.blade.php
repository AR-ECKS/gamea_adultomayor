@props(['activePage'])
@php
    $user = Auth::user();
    $empresa_id = $user->empresa_id;
    $nombre_empresa = '';
    $classbg = 'bg-personal';

@endphp
<div class="personal"></div>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs  fixed-start  bg-white" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href=" {{ route('dashboard') }} ">
            <!-- <img src="{{ asset('assets') }}/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo"> -->
            <span class="ms-2 font-weight-bold text-dark">SISTEMA WEB </span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @can('acceso_panel_control')
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-dark {{ $activePage == 'dashboard' ? ' active text-white ' . $classbg : '' }}"
                            href="{{ route('dashboard') }}">
                            <!-- <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem; color: {{ $activePage == 'dashboard' ? 'white' : 'inherit' }}"
                                    class="fas fa-store  ps-2 pe-2 text-center"></i>
                            </div>
                            <span class="nav-link-text ms-1">Inicio</span> -->
                            <img src="https://img.icons8.com/?size=100&id=J3w76cMS9cUS&format=png&color=000000" style="margin-right: 2px; margin-left:3px" width="27" alt=""> Inicio
                        </a>
                    </li>
                </ul>
            @endcan

            @can('acceso_administracion')
                <li class="nav-item{{ $activePage == 'usuarios' || $activePage == 'roles' ? ' show' : '' }}">
                    <a class="nav-link text-dark" href="#" data-bs-toggle="collapse" data-bs-target="#adminSubMenu">
                        <!-- <i style="font-size: 1.2rem;" class="fas fa-cogs ps-2 pe-2 text-center"></i> Administración -->
                        <img src="https://img.icons8.com/?size=100&id=67411&format=png&color=000000" width="30" alt="">Administración
                    </a>
                    <div class="collapse{{ $activePage == 'usuarios' || $activePage == 'roles' ? ' show' : '' }}"
                        id="adminSubMenu">
                        <ul class="nav flex-column">
                            @can('acceso_roles')
                            <li class="nav-item">
                                <a class="nav-link text-dark {{ $activePage == 'usuarios' ? ' active ' . $classbg : '' }}"
                                    href="{{ route('users.index') }}">
                                    <!-- <div
                                        class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                                        <i style="font-size: 1rem;" class="fas fa-users ps-2 pe-2 text-center"></i>
                                    </div>
                                    <span class="nav-link-text ms-1">Usuarios</span> -->
                                    <img src="https://img.icons8.com/?size=100&id=0N99feShYSBW&format=png&color=000000
" alt="" width="27" style="margin-right:5px ;"> Usuarios
                                </a>
                            </li>
                            @endcan
                            @can('acceso_usuarios')
                            <li class="nav-item">
                                <a class="nav-link text-dark {{ $activePage == 'roles' ? ' active ' . $classbg : '' }}"
                                    href="{{ route('roles.index') }}">
                                    <!-- <div
                                        class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                                        <i style="font-size: 1rem;" class="fas fa-shield-alt ps-2 pe-2 text-center"></i>
                                    </div>
                                    <span class="nav-link-text ms-1">Roles
                                    </span> -->
                                    <img src="https://img.icons8.com/?size=100&id=81140&format=png&color=000000" alt="" width="27" style="margin-right: 5px;"> Roles
                                </a>
                            </li>
                            @endcan
                            <!-- Agrega más elementos del submenú según sea necesario -->
                        </ul>
                    </div>
                </li>
            @endcan
            @can('acceso_adulto_mayor')
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-dark {{ $activePage == 'Adultomayor' ? ' active text-white ' . $classbg : '' }}"
                            href="{{ route('adultomayor.index') }}">
                            <!-- <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem; color: {{ $activePage == 'Adultomayor' ? 'white' : 'inherit' }}"
                                    class="fas fa-users ps-2 pe-2 text-center"></i>
                            </div>
                            <span class="nav-link-text ms-1">Adulto mayor</span> -->
                            <img src="https://img.icons8.com/?size=100&id=13502&format=png&color=000000" width="30"  alt="" style=" margin-left:3px" > Adulto Mayor
                        </a>
                    </li>
                </ul>
            @endcan

            @can('acceso_registro_atencion')
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-dark {{ $activePage == 'Registro' ? ' active text-white ' . $classbg : '' }}"
                            href="{{ route('registroatencion.index') }}">
                            <!-- <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem; color: {{ $activePage == 'Registro' ? 'white' : 'inherit' }}"
                                    class="fas fa-users ps-2 pe-2 text-center"></i>
                            </div>
                            <span class="nav-link-text ms-1">Registro Atención</span> -->
                            <img src="https://img.icons8.com/?size=100&id=QanbId3SGVR7&format=png&color=000000" width="30"  alt="" style=" margin-left:3px" > Registro de atención
                        </a>
                    </li>
                </ul>
            @endcan
            
            @can('acceso_registro_atencion')
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-dark {{ $activePage == 'Coordinacion' ? ' active text-white ' . $classbg : '' }}"
                            href="{{ route('coordinacion_caso.index') }}">
                            <!-- <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem; color: {{ $activePage == 'Registro' ? 'white' : 'inherit' }}"
                                    class="fas fa-users ps-2 pe-2 text-center"></i>
                            </div>
                            <span class="nav-link-text ms-1">Coordinacion Caso</span> -->
                            <img src="https://img.icons8.com/?size=100&id=YwpoJRvOXJ6B&format=png&color=000000" width="30"  alt="" style=" margin-left:3px" > Coordinación de caso
                        </a>
                    </li>
                </ul>
            @endcan
                 
            @can('acceso_registro_atencion')
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-dark {{ $activePage == 'Seguimiento' ? ' active text-white ' . $classbg : '' }}"
                            href="{{ route('seguimiento_caso.index') }}">
                            <!-- <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem; color: {{ $activePage == 'Seguimiento' ? 'white' : 'inherit' }}"
                                    class="fas fa-users ps-2 pe-2 text-center"></i>
                            </div>
                            <span class="nav-link-text ms-1">Coordinacion Caso</span> -->
                            <img src="https://img.icons8.com/?size=100&id=35639&format=png&color=000000 " width="30"  alt="" style=" margin-left:3px" > Seguimiento de Caso
                        </a>
                    </li>
                </ul>
            @endcan

            {{-- @can('acceso_registro_atencion') --}}
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-dark {{ $activePage == 'CasoExtravio' ? ' active text-white ' . $classbg : '' }}"
                            href="{{ route('caso_extravio.index') }}">
                            <!-- <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem; color: {{ $activePage == 'CasoExtravio' ? 'white' : 'inherit' }}"
                                    class="fas fa-users ps-2 pe-2 text-center"></i>
                            </div>
                            <span class="nav-link-text ms-1">Coordinacion Caso</span> -->
                            <img src="https://img.icons8.com/?size=100&id=35639&format=png&color=000000 " width="30"  alt="" style=" margin-left:3px" > Casos de Extravio
                        </a>
                    </li>
                </ul>
            {{-- @endcan --}}

    </div>

</aside>
