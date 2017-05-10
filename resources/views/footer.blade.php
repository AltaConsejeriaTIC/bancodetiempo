<footer>
	<div class="container text-white">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-3">
					<div class="row link-social-network">
						<a href="/how">{{ trans('footer.how') }}</a>
					</div>
				</div>
				<div class="col-md-3 col-sm-3">
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
				<div class="col-md-5 col-sm-5 text-center">
					<div class="row col-md-offset-2">
							<div class="col-md-8 col-md-offset-3 col-sm-8 col-sm-offset-3">
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
                <div class="col-md-10 col-md-offset-1 text-center">
                    <img src="{{ asset('images/logoFooter1.png') }}" alt="" class="line-r-v col-sm-4 col-xs-4 col-md-3">
                    <img src="{{ asset('images/logoFooter2.png') }}" alt="" class=' col-sm-4  col-xs-4 col-md-4'>
                    <img src="{{ asset('images/logoFooter3.png') }}" alt="" class="line-l-v  col-sm-4 col-xs-4 col-md-3">
                </div>

			</div>
		</div>
	</div>

</footer>
<generalmodal   name='login' :state='myData.login' state-init='false'>
    <div slot="modal" >
        <div class="modal-content-box">
            <div class="modal-wrapper">
              <div class="modal-container">
                <div class="modal-header">
                  <button type="button" class="close circle-shape" @click='myData.login = false'><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-header-welcome">
                    <h1 class="title1">¡Ingresa!</h1>
                </div>
                <div class="modal-body-welcome">
                  <p class="paragraph2">
                    Elige la opción que desees para ingresar.
                  </p>
                  <div class="modal-button-center">
                    <div class="row">
                      <div class="col-xs-12">
                        <a href="/loginRedes/facebook" class="col-xs-12 col-md-12 button6 social-button facebook-login">Ingresa con Facebook <i class="fa fa-facebook"></i></a>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-xs-12">
                        <a href="/loginRedes/google"  class="col-xs-12 col-md-12 button6 social-button google-login">Ingresa con Google <i class="fa fa-google"></i></a>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12">
                        <a href="/loginRedes/linkedin"  class="col-xs-12 col-md-12 button6 social-button linkedin-login">Ingresa con Linkedin <i class="fa fa-linkedin"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</generalmodal>


