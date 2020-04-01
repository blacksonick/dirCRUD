<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DirCRUD @yield('title')</title>
    <link href="{{ asset('fonts/font-awesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/table.css') }}" rel="stylesheet">
  </head>
  <body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" data-toggle="tooltip" data-placement="bottom" title="DirCRUD">
                    DirCRUD
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @if (auth()->check())
                    <ul class="navbar-nav mr-auto ">
                        <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Direcciones">
                            <a class="nav-link" href="{{ url('/direccion') }}">{{ __('Direcciones') }}</a>
                        </li>
                    </ul>
                    @endif
                    <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Iniciar sesión">
                            <a class="nav-link btn btn-success text-white" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Registrarse">
                                <a class="nav-link btn btn-primary text-white" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="{{ Auth::user()->name }}">
                            <a class="nav-link" href="#">Bienvenido, <b>{{ Auth::user()->name }}</b></a>
                        </li>
                        <li class="nav-item d-none d-lg-block" data-toggle="tooltip" data-placement="bottom" title="Cerrar sesión"> 
                            <button class=" btn btn-danger py-2" type="submit" data-toggle="modal" data-target="#logout"><i class="text-white fa fa-power-off"></i></button>
                            
                        </li>
                        <li class="nav-item d-lg-none d-md-block" data-toggle="tooltip" data-placement="bottom" title="Cerrar sesión">  
                            <button class=" btn btn-danger btn-block py-2" type="submit" data-toggle="modal" data-target="#logout"><i class="text-white fa fa-power-off"></i></button>
                        </li>
                    @endguest
                </ul>
                </div>
            </div>
        </nav>

        <div class="container pt-5 mt-5">
            <div class="row">  
                @yield('contenido')
            </div>
        </div>
    </div>
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >¿Listo para salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-window-close text-color-8"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Seleccione "<b>Cerrar sesión</b>" si está listo para finalizar su sesión actual.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <a type="submit"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger">Cerrar sesión</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
  </body>
</html>
