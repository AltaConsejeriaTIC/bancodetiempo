<nav class="navbar navbar-expand-lg navbar-dark bg-cambalachea">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/images/logo2.png" alt="Bogotá cambalachea">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <div class="row col-md-12">
                <div class="col-12 col-md-6 col-lg-9 text-center text-lg-right mt-3">
                    <a href="/listadoEstudiantes" class="btn btn-outline-primary bg-white">Listado estudiantes</a>
                </div>
                <div class="col-12 col-md-4 col-lg-2 px-md-1 text-center text-md-right mt-3" data-toggle="dropdown">
                    <p class="text-white">Hola <strong>{{Auth::user()->first_name . " " . Auth::user()->last_name}}</strong></p>
                </div>
                <div class="col-12 col-md-2 col-lg-1 px-md-0 text-center" data-toggle="dropdown">
                    <div class="row justify-content-center">
                        <div class="col-4 col-md-6 col-lg-10">                            
                            @include('partial/imageProfile', array('cover' => Auth::user()->avatar.'&w=200', 'id' => 'myAvatar', 'border' => '#fff', 'borderSize' => '1px'))
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row justify-content-md-end">
                        <div class="col-12 col-md-3">
                            <div class="dropdown-menu">
                                <ul class="nav">
                                    <a class='dropdown-item' href="/perfil">Mi perfil</a>
                                    <a class='dropdown-item'>Cambiar contraseña</a>
                                    <a class="dropdown-item" href="/logout" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Cerrar sesión</a>
                                    <form id="frm-logout" action="/logout" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
</nav>
