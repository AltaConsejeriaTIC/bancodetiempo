<generalmodal name='login' :state='myData.login' state-init='false'>
    <div slot="modal" v-cloak>
        <div class="modal-content-box">
            <div class="modal-wrapper">
                <div class="modal-container register-popup">
                    <div class="modal-header">
                        <button type="button" class="close circle-shape" @click='myData.login = false'><span
                                    aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-header-welcome margin-b-30">
                        <h1 class="title1">{!! trans('login.title') !!}</h1>
                    </div>
                    <div class="modal-body-welcome">
                        <p class="paragraph2 margin-vertical-12">
                            {!! trans('login.description') !!}
                        </p>
                        <div class="modal-button-center">
                            <div class="row">
                                <div class="col-xs-12">
                                    <a href="/loginRedes/facebook" id="register-facebook"
                                       class="col-xs-12 col-md-12 button6 social-button facebook-login">{!! trans('login.facebook-option') !!}
                                        <i class="fa fa-facebook"></i></a>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <a href="/loginRedes/google" id="register-google"
                                       class="col-xs-12 col-md-12 button6 social-button google-login">{!! trans('login.google-option') !!}<i class="fa fa-google"></i></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <a href="/loginRedes/linkedin" id="register-linkedin"
                                       class="col-xs-12 col-md-12 button6 social-button linkedin-login">{!! trans('login.linkedin-option') !!}<i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</generalmodal>
