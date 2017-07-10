<generalmodal name='register' :state='myData.register' state-init='false'>
    <div slot="modal">
        <div class="modal-content-box">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <div class="modal-header">
                        <button type="button" class="close circle-shape" @click='myData.register = false'><span
                                    aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-header-welcome">
                        <h1 class="title1">¡Registrate!</h1>
                    </div>
                    <div class="terms">
                        <p class="paragraph2">
                            Para participar aqui debes aceptar terminos y condiciones
                        </p>

                        <div class="row">
                            <div class="col-xs-12">
                                <input type="checkbox" id="age" name="age" value="true">
                                <label for="age">Confirmo que soy mayor de edad</label>
                            </div>
                            <div class="col-xs-12">
                                <input type="checkbox" id="terms" name="terms">
                                <label for="terms">Acepto los <a href="/content/terms">términos y condiciones</a> de la plataforma.</label>
                            </div>
                        </div>


                    </div>
                    <div class="modal-body-welcome">
                        <p class="paragraph2">
                            Elige la opción que desees para registrarte.
                        </p>
                        <div class="modal-button-center">
                            <div class="row">
                                <div class="col-xs-12">
                                    <a href="/loginRedes/facebook"
                                       class="col-xs-12 col-md-12 button6 social-button facebook-login">Registrate con
                                        Facebook <i class="fa fa-facebook"></i></a>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <a href="/loginRedes/google"
                                       class="col-xs-12 col-md-12 button6 social-button google-login">Registrate con
                                        Google <i class="fa fa-google"></i></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <a href="/loginRedes/linkedin"
                                       class="col-xs-12 col-md-12 button6 social-button linkedin-login">Registrate con
                                        Linkedin <i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</generalmodal>
