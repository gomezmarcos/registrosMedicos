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
                <a class="navbar-brand" href="/resume">Registro Medico Personal</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <!-- Page Content -->
    @yield('content')
</body>
</html>
