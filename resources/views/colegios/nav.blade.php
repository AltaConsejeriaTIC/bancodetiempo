<nav class="navbar navbar-expand-lg navbar-dark bg-cambalachea pl-lg-5 pt-3 pb-4">
	<a class="navbar-brand" href="/">
		<img src="/images/logo2.png" alt="Bogotá cambalachea">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarContent">
		<div class="navbar-nav mr-auto"></div>
		<form action="/login" method="post" class="row form-inline my-2 my-lg-0">
			{{ csrf_field() }}
			<div class="col-md">
				<label for="" class="text-white text-sm d-block">Email</label>
				<input type="text" name="email" class="form-control rounded text-sm">
			</div>
			<div class="col-md">
				<label for="" class="text-white text-sm d-block">Contraseña</label>
				<input type="password" name="password" class="form-control rounded text-sm">
				<a class="text-white text-xs position-absolute">¿Olvidaste la contraseña?</a>
			</div>
			<div class="col-md">
				<p class="text-sm mb-0">&nbsp;</p>
				<button type="submit" class="btn bg-login-btn text-white rounded text-sm">Iniciar sesión</button>
			</div>
		</form>
	</div>
</nav>