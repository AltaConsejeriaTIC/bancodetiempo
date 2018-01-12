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
        <a class="nav-link" href="#">Colegio {{Auth::user()->colegio()->name}}</a>
      </li>
    </ul>
    <div>
        <div class="row">
            <div class="col-12">
                <p class="text-white">Hola <strong>{{Auth::user()->first_name . " " . Auth::user()->last_namer}}</strong></p>
            </div>
        </div>
    </div>
  </div>
</nav>