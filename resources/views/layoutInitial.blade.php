<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="stylesheet" href="/css/fileinput.css"/>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/css/jquery-ui.min.css"/>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/fileinput.js"></script>
    <script src="/js/bootstrap.min.js"></script>
   <script src="/js/validator.js"></script>

    @yield('stylesAndScripts')

    @yield('title')

</head>
<body>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Registro Medico Personal</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <!-- <li><a href="#">Datos Personales</a></li> -->
                    <li><a href="/clinicHistory">Antecedentes Clinicos</a></li>
                    <li><a href="/studies">Estudios Clinicos</a></li>
                    <li><a href="/misc">Varios</a></li>
                    <li><a href="/profile">Editar Perfil</a></li>
                    <li>
                        <a href="/logout">Cerrar Sesion <span class="fa fa-power-off"/></a>
                        <!--
                        <a href="http://localhost:8000/logout"><span class="fa fa-sign-out"/>Cerrar Session</a>
                        -->
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <!-- Page Content -->
    @yield('content')
</body>
</html>
