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
        <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <div>
        <form class="form-horizontal" method="POST" action="/login">
        <div class="row">
            {{ csrf_field() }}
            <div class="col-4 form-group">
                <label for="" class="text-white text-sm mb-0">Email</label>
                <input type="text" name="email" class="form-control rounded-0 text-sm">
            </div>
            <div class="col-4 form-group">
                <label for="" class="text-white text-sm mb-0">Contraseña</label>
                <input type="text" name="password" class="form-control rounded-0 text-sm">
                <a class="text-white text-xs position-absolute">¿Olvidaste la contraseña?</a>
            </div>
            <div class="col-4">
                <p class="text-white text-sm mb-2">&nbsp;</p>
                <button type="submit" class="btn btn-info rounded-0 text-sm">Iniciar sesión</button>
            </div>
        </div>
        </form>
    </div>
  </div>
</nav>