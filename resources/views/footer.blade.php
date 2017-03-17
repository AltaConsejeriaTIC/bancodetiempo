<footer>
	<div class="container text-white">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="row link-social-network">
						<a href="#">¿Cómo funciona?</a>
					</div>
				</div>
				<div class="col-md-3">
					<div class="row link-social-network">
						<a href="/content/privacity">Políticas de Privacidad</a>
					</div>
					<div class="row link-social-network">
						<a href="/content/terms">Términos y Condiciones</a>
					</div>
					<div class="row link-social-network">
						<a href="/content/questions">Preguntas Frecuentes</a>
					</div>
				</div>
				<div class="col-md-5 text-center">
					<div class="row col-md-offset-2">
							<div class="col-md-8 col-md-offset-3">
								<div>
									<a class="circle-social-network text-center"><i class="fa fa-facebook icons-social-network" aria-hidden="true"></i></a>
								</div>
								<div>
									<a href="https://twitter.com/cambalachea" target="_blank" class="circle-social-network text-center"><i class="fa fa-twitter icons-social-network" aria-hidden="true"></i></a>
								</div>
								<div>
									<a class="circle-social-network text-center"><i class="fa fa-instagram icons-social-network" aria-hidden="true"></i></a>
								</div>
							</div>
							<div class="space10"></div>
							<div class="row col-md-12">
								¿Tienes sugerencias, dudas o comentarios? Contáctanos a <a href="mailto:evenvivelab_bog@unal.edu.co">admin@cambalachea.com </a>
							</div>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<div class="container">
			<div class="row">
				<div class="col-md-7 col-md-offset-3">
					<div class="col-md-2 logo-footer">
						<img src="{{ asset('images/moneda.png') }}">
					</div>
					<div class="col-md-2 logo-footer">
						<img src="{{ asset('images/moneda.png') }}">
					</div>
					<div class="col-md-2 logo-footer">
						<img src="{{ asset('images/moneda.png') }}">
					</div>
				</div>
			</div>
		</div>
	</div>

</footer>

@foreach(Illuminate\Support\Facades\Session::get("filters.tags", []) as $tag)
	<style>
		a[tag='{{$tag->id}}']{
			background-color:#0f6783;
			border-color:#0f6783;
			color:#fff !important;
		}
	</style>
@endforeach
