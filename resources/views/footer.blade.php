<footer>
	<div class="container text-white">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="row link-social-network">
						<a href="/how">{{ trans('footer.how') }}</a>
					</div>
				</div>
				<div class="col-md-3">
					<div class="row link-social-network">
						<a href="/content/privacity">{{ trans('footer.privacity') }}</a>
					</div>
					<div class="row link-social-network">
						<a href="/content/terms">{{ trans('footer.terms') }}</a>
					</div>
					<!--
					<div class="row link-social-network">
						<a href="/content/questions">Preguntas Frecuentes</a>
					</div>
					-->
				</div>
				<div class="col-md-5 text-center">
					<div class="row col-md-offset-2">
							<div class="col-md-8 col-md-offset-3">
								<div>
									<a href="https://www.facebook.com/Cambalachea.co" target="_blank" class="circle-social-network text-center"><i class="fa fa-facebook icons-social-network" aria-hidden="true"></i></a>
								</div>
								<div>
									<a href="https://twitter.com/cambalachea" target="_blank" class="circle-social-network text-center"><i class="fa fa-twitter icons-social-network" aria-hidden="true"></i></a>
								</div>
								<!--
								<div>
									<a class="circle-social-network text-center"><i class="fa fa-instagram icons-social-network" aria-hidden="true"></i></a>
								</div>
								-->
							</div>
							<div class="space10"></div>
							<div class="row col-md-12">
								{!! trans('footer.textContact') !!}
							</div>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<div class="container">
			<div class="row">
				<div class="col-md-7 col-md-offset-2">
					<img class="footer-logo" src="{{ asset('images/logos_footer-3-14.png') }}">
				</div>
			</div>
		</div>
	</div>

</footer>


