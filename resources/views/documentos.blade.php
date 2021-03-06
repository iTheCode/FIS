<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="/vendors/bower_components/animate.css/animate.min.css">
        <link rel="stylesheet" href="/vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css">
        <link rel="stylesheet" href="/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css">

        <!-- App styles -->
        <link rel="stylesheet" href="/css/app.min.css">
    </head>

    <body data-ma-theme="green">
        <main class="main">
            <div class="page-loader">
                <div class="page-loader__spinner">
                    <svg viewBox="25 25 50 50">
                        <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                </div>
            </div>

            <header class="header">
                <div class="navigation-trigger hidden-xl-up" data-ma-action="aside-open" data-ma-target=".sidebar">
                    <div class="navigation-trigger__inner">
                        <i class="navigation-trigger__line"></i>
                        <i class="navigation-trigger__line"></i>
                        <i class="navigation-trigger__line"></i>
                    </div>
                </div>

                <div class="header__logo hidden-sm-down">
                    <h1><a href="/">Direccion de Escuela</a></h1>
                </div>

            </header>

            @include('menu')



            <section class="content">
                <header class="content__title">
                    <h1>Documentos Adjuntos</h1>

                    <div class="actions">
                            <div class="dropdown actions__item">
                                <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item">Refresh</a>
                                </div>
                            </div>
                        </div>
                </header>

                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Docentes</h2>
                    </div>

                    <div class="card-block">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Descripcion</th>
                                <th>Fecha</th>
                                <th>Subido Por</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;?>
                            @foreach($documentos as $documento)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $documento->descripcion or '' }}</td>
                                <td>{{ $documento->fecha }}</td>
                                <td>{{ $documento->secretaria->nombres or ''}}</td>

                                <td><a href="/documento/{{ $documento->id_documentacion }}"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a> <a href="/delete/documento/{{ $documento->id_documentacion }}"><i class="zmdi zmdi-minus zmdi-hc-fw"></i></a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table><br>
                        <div class="text-right"><a href="/create/documento"><button class="btn btn-info btn--icon waves-effect"><i class="zmdi zmdi-plus"></i></button></a></div>
                        
                    </div>
                </div>



                <footer class="footer hidden-xs-down">
                    <p>© Direccion de Escuela - FIS.</p>

                </footer>

            </section>


        </main>

        <!-- Older IE warning message -->
            <!--[if IE]>
                <div class="ie-warning">
                    <h1>Advertencia!!</h1>
                    <p>Estás usando una versión muy antigua de Internet Explorer, porfavor te recomendamos usar un mejor navegador para este sitio web.</p>

                    <div class="ie-warning__downloads">
                        <a href="http://www.google.com/chrome">
                            <img src="/img/browsers/chrome.png" alt="">
                        </a>

                        <a href="https://www.mozilla.org/en-US/firefox/new">
                            <img src="/img/browsers/firefox.png" alt="">
                        </a>

                        <a href="http://www.opera.com">
                            <img src="/img/browsers/opera.png" alt="">
                        </a>

                        <a href="https://support.apple.com/downloads/safari">
                            <img src="/img/browsers/safari.png" alt="">
                        </a>

                        <a href="https://www.microsoft.com/en-us/windows/microsoft-edge">
                            <img src="/img/browsers/edge.png" alt="">
                        </a>

                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="/img/browsers/ie.png" alt="">
                        </a>
                    </div>
                    <p>Sorry for the inconvenience!</p>
                </div>
            <![endif]-->

        <!-- Javascript -->
        <!-- Vendors -->
        <script src="/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="/vendors/bower_components/tether/dist/js/tether.min.js"></script>
        <script src="/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="/vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="/vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="/vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js"></script>
        <script src="/vendors/bower_components/Waves/dist/waves.min.js"></script>

        <script src="/vendors/bower_components/flot/jquery.flot.js"></script>
        <script src="/vendors/bower_components/flot/jquery.flot.resize.js"></script>
        <script src="/vendors/bower_components/flot.curvedlines/curvedLines.js"></script>
        <script src="/vendors/bower_components/jqvmap/dist/jquery.vmap.min.js"></script>
        <script src="/vendors/bower_components/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script src="/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        <script src="/vendors/bower_components/salvattore/dist/salvattore.min.js"></script>
        <script src="/vendors/jquery.sparkline/jquery.sparkline.min.js"></script>
        <script src="/vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

        <!-- Charts and maps-->

        <!-- App functions and actions -->
        <script src="/js/app.min.js"></script>
    </body>
</html>