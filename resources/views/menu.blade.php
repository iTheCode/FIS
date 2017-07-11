
            <aside class="sidebar">
                <div class="scrollbar-inner">
                    <div class="user">
                        <div class="user__info" data-toggle="dropdown">
                            <img class="user__img" src="/demo/img/profile-pics/1.png" alt="">
                            <div>
                                <div class="user__name">{{ Auth::user()->name }}</div>
                                <div class="user__email">{{ Auth::user()->email }}</div>
                            </div>
                        </div>

                        <div class="dropdown-menu">
                            <!--<a class="dropdown-item" href="index.html">View Profile</a>
                            <a class="dropdown-item" href="index.html">Settings</a>-->
                            <a class="dropdown-item" href="index.html">Logout</a>
                        </div>
                    </div>

                    <ul class="navigation">
                        <li class="@@inicioeactive"><a href="/dashboard"><i class="zmdi zmdi-home"></i> Inicio</a></li>

                        <li class="@@docenteactive"><a href="/docentes"><i class="zmdi zmdi-account-box"></i> Docentes</a></li>

                        <li class="@@asistenciaactive"><a href="/asistencia"><i class="zmdi zmdi-run"></i> Asistencia</a></li>
                        <li class="@@cursosactive"><a href="/cursos"><i class="zmdi zmdi-library"></i> Cursos</a></li>
                        <li class="@@horarioactive"><a href="/horario"><i class="zmdi zmdi-map"></i> Horario</a></li>
                        <li class="@@cronogramasactive"><a href="/cronograma"><i class="zmdi zmdi-assignment"></i> Cronograma</a></li>
                        <li class="@@documentosactive"><a href="/documentos"><i class="zmdi zmdi-collection-pdf"></i> Documentos</a></li>

                    </ul>
                </div>
            </aside>
+