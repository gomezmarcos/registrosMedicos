<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="stylesheet" href="{{env('APP_STATIC_PATH')}}/css/fileinput.css"/>
    <link rel="stylesheet" href="{{env('APP_STATIC_PATH')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{env('APP_STATIC_PATH')}}/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{env('APP_STATIC_PATH')}}/css/jquery-ui.min.css"/>

    <script src="{{env('APP_STATIC_PATH')}}/js/jquery.min.js"></script>
    <script src="{{env('APP_STATIC_PATH')}}/js/jquery-ui.min.js"></script>
    <script src="{{env('APP_STATIC_PATH')}}/js/fileinput.js"></script>
    <script src="{{env('APP_STATIC_PATH')}}/js/locales/es.js"></script>
    <script src="{{env('APP_STATIC_PATH')}}/js/bootstrap.min.js"></script>
    <script src="{{env('APP_STATIC_PATH')}}/js/validator.js"></script>

    <script>
    $.datepicker.regional['es'] = {
        showButtonPanel: true,
            closeText: 'Cerrar',
            prevText: '<Ant',
            nextText: 'Sig>',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };
    $.datepicker.setDefaults($.datepicker.regional['es']);

    </script>

    @yield('stylesAndScripts')

    @yield('title')

</head>
<body style="margin-top:60px;margin-bottom:60px">
    <nav class="navbar navbar-inverse navbar-static-top navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/resume">Registro Medico Personal</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/resume">Datos Personales</a></li> 
                    <li><a href="/clinicHistory">Antecedentes Clinicos</a></li>
                    <li><a href="/studies">Estudios Clinicos</a></li>
                    <li><a href="/misc">Varios</a></li>
                    <li><a href="/profile">Editar Perfil</a></li>
               <?php
                   $admins= explode(",",env('APP_ADMIN_USERS'));
                   $user_id= Auth::user()->id;
                   if( in_array($user_id, $admins) ){
               ?>
                    <li><a href="/registration">Registrar Usuarios</a></li>
               <?php
                   }
                ?>
                    <li>
                        <a href="/logout">Cerrar Sesion <span class="fa fa-power-off"/></a>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <!-- Page Content -->
    @yield('content')
    <div style="margin:50px">
    <hr>
    <footer>
        <p class="text-center">© Registros Medicos Personales - 2016</p>
    </footer>
    </div>
</body>
</html>
