<generalmodal name='register' :state='myData.register' state-init='false'>
    <div slot="modal" v-cloak>
        <div class="modal-content-box">
            <div class="modal-wrapper">
                <div class="modal-container register-popup">
                    <div class="modal-header">
                        <button type="button" class="close circle-shape" @click='myData.register = false'><span
                                    aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-header-welcome">
                        <h1 class="title1">¡Registrate!</h1>
                    </div>
                    <div class="terms" id="register-terms">
                        <div class="row form-custom">
                            <div class="col-xs-12">
                                <p class="paragraph4">Para comenzar a cambalachear, por favor confirma la siguiente
                                    información</p>
                            </div>
                            <div class="col-xs-12">
                                <input id="registerPopup-age" type="checkbox" class="square">
                                <label for="registerPopup-age"> Confirmo que soy mayor de edad</label>
                            </div>
                            <div class="col-xs-12">
                                <input type="checkbox" id="registerPopup-terms" class="square">
                                <label for="registerPopup-terms">Acepto los <a href="/content/terms">términos y
                                        condiciones</a> de la
                                    plataforma.</label>
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
                                    <a href="/loginRedes/facebook" id="register-facebook"
                                       class="col-xs-12 col-md-12 button6 social-button facebook-login">Registrate con
                                        Facebook <i class="fa fa-facebook"></i></a>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <a href="/loginRedes/google" id="register-google"
                                       class="col-xs-12 col-md-12 button6 social-button google-login">Registrate con
                                        Google <i class="fa fa-google"></i></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <a href="/loginRedes/linkedin" id="register-linkedin"
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
