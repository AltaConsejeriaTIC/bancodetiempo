<nav class="navbar navbar-expand-lg navbar-dark bg-cambalachea">
  <a class="navbar-brand" href="/">
      <img src="/images/logo2.png" alt="Bogotá cambalachea">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">{{Auth::user()->colegio()->name}}</a>
      </li>
    </ul>
    <div class="col-5">
        <div class="row justify-content-end">
            <div class="col-4"></div>
            <div class="col-4 text-right">
                <a href="/compromisos" class="btn btn-outline-primary bg-white">Mis compromisos</a>
            </div>
        </div>
    </div>
    <div>
        <div class="row justify-content-end">
            <div class="col-12">
                <p class="text-white text-right" style="cursor:pointer" data-toggle="dropdown">Hola <strong>{{Auth::user()->first_name . " " . Auth::user()->last_namer}}</strong> <img src="{{route("getImage")}}?img={{Auth::user()->avatar}}&w=200" class="col-2" alt=""></p>
                <div class="col-12">
                    <div class="row justify-content-end">
                        <div class="col-8">
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
  </div>
</nav>