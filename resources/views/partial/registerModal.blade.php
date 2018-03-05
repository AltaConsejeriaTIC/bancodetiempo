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
                            <br>
                            <ul class="nav nav-pills">
                                <li role="presentation" class="active"><a data-toggle="tab" href="#register">Registro</a></li>
                                <li role="presentation"><a data-toggle="tab" href="#login">Login</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="register" class="tab-pane fade in active">
                                <form action="/RegisterWithPass" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <input type="text" name="name" placeholder="Nombre" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <input type="text" name="last_name" placeholder="Apellido" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <input type="email" name="email" placeholder="Email" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <input type="password" name="password" placeholder="Contraseña" class="form-control" min='6' required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" class="form-control" minlength='6' required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <button type="submit" class="btn btn-success text-white">Registrarse</button>
                                        </div>
                                    </div>
                                </form>
                                </div>

                                <div id="login" class="tab-pane fade">
                                    <form action="/loginWithPass" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <input type="email" name="email" placeholder="Email" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <input type="password" name="password" placeholder="Contraseña" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <button type="submit" class="btn btn-success text-white">Ingresar</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</generalmodal>

@if(count($errors->all()) > 0)
    <script>
        alert("{{implode("\n", $errors->all())}}");
    </script>
@endif
