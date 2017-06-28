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
