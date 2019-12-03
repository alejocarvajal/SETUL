<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administraci&oacute;n SETUL - Universidad Libre Seccional Pereira</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/metisMenu.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" >

    <script src="{{ asset('js/jquery.min.js') }}"></script>

</head>

<body>

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{!!URL('/admin') !!}">Administraci&oacute;n SETUL</a>
            </div>
           

            <ul class="nav navbar-top-links navbar-right">
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                            <li>
                                <a href="#"><i class="fa fa-users fa-fw"></i> Usuario<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{!!URL('/admin/users/new') !!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                    </li>
                                    <li>
                                        <a href="{!!URL('/admin') !!}"><i class='fa fa-list-ol fa-fw'></i> Usuarios</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-child fa-fw"></i> Asignaturas<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{!!URL('/admin/asignatura/new') !!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                    </li>
                                    <li>
                                        <a href="{!!URL('/admin/asignatura') !!}"><i class='fa fa-list-ol fa-fw'></i> Asignaturas</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-child fa-fw"></i> Tests<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{!!URL('/admin/tests/new') !!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                    </li>
                                    <li>
                                        <a href="{!!URL('/admin/tests') !!}"><i class='fa fa-list-ol fa-fw'></i> Tests</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-book fa-fw"></i> Preguntas<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{!!URL('/admin/preguntas/new') !!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                    </li>
                                    <li>
                                        <a href="{!!URL('/admin/preguntas') !!}"><i class='fa fa-list-ol fa-fw'></i> Preguntas</a>
                                    </li>
                                    <li>
                                        <a href="{!!URL('/admin/preguntas/importView') !!}"><i class='fa fa-list-ol fa-fw'></i> Importar</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-child fa-fw"></i> Participantes<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{!!URL('/admin/participantes/new') !!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                    </li>
                                    <li>
                                        <a href="{!!URL('/admin/participantes') !!}"><i class='fa fa-list-ol fa-fw'></i> Participantes</a>
                                    </li>
                                    <li>
                                        <a href="{!!URL('/admin/participantes/importView') !!}"><i class='fa fa-list-ol fa-fw'></i> Importar</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-file fa-fw"></i> Configuraci&oacute;n<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{!!URL('/admin/config/new') !!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                    </li>
                                    <li>
                                        <a href="{!!URL('/admin/config') !!}"><i class='fa fa-list-ol fa-fw'></i> Configuracion</a>
                                    </li>
                                </ul>
                            </li>
                    </ul>
                </div>
            </div>

     </nav>

        <div id="page-wrapper">
            @yield('contenido')

        </div>

    </div>
    


    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/miScript.js') }}"></script>

</body>

</html>
