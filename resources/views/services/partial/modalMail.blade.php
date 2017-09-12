@if(session('response'))
    <generalmodal name='notificationEmail' :state='myData.notificationEmail' state-init='true'>
        <div slot="modal" class='box row' v-cloak>
            <button type="button" class='close' v-on:click='myData.notificationEmail = false'><i
                        class='fa fa-close'></i></button>
            <h1 class='title1 col-md-12 text-center'>¡Notificación enviada!</h1>
            <p class='text-center col-md-12'>Se ha enviado un correo electrónico a {{ $service->user->first_name }}
                informándole sobre tu interés en tomar su oferta. <br>
                En los próximos días {{ $service->user->first_name }} te contactará a través de la plataforma.</p>
            <p class='text-center col-md-12 title1'>
                <i class="fa fa-signal" aria-hidden="true"
                   style='font-size: 60px;font-size: 50px;transform: rotateZ(-90deg) translateX(40px) translateY(-10px);'></i><i
                        class="fa fa-envelope" aria-hidden="true" style='font-size: 120px;'></i>
            </p>
        </div>
    </generalmodal>

@endif


<contactmailmodal service='{{$service->id}}' :contact-mail='myData.contactMail'>
    <div slot="modal" class='box row' v-cloak>
        <button type="button" class='close' v-on:click='putMyData("contactMail", false)'><i class='fa fa-close'></i>
        </button>
        {!! Form::open(['url' => '/defaultsend/'.$service->id, 'method' => 'get', 'class' => 'form-custom col-md-10 col-md-offset-1', 'form-validation']) !!}
        <div class='row'>
            <div class="col-md-12 text-center title1 not-padding">Comunícate
                con {{$service->user->first_name}}</div>
        </div>
        <div class="space"></div>
        <div class="row">
            <div class="col-md-12 paragraph2  not-padding">
                <p>- ¡Preséntate!<br>
                    - Cuéntale por qué estás interesado en tomar su oferta.<br>
                    - Coméntale lo que esperas recibir.<br>
                    - Concreta los datos del acuerdo y envíale una propuesta.</p>
            </div>
            <div>
                <div class="row">
                    <div class="col-md-12">
                        <textarea name="content" class='validation col-xs-12' id="content" rows="10"
                                  placeholder='Ej. ¡Hola! Me llamo Joe, me gustaría tomar tu oferta ya que dentro de poco será mi matrimonio, y quiero conservar los mejores recuerdos de ese día. ¿Te parece bien si nos encontramos el Lunes, 6 de Agosto a las 3 PM en el Parque Simón Bolivar para realizar la actividad? Espero tu respuesta.'
                                  data-validations='["required", "min:20", "max:250"]'></textarea>
                        <div class='clearfix'></div>
                        <div class="msg" errors='content'>
                            <p error='required'>Este campo es obligatorio.</p>
                            <p error='min'>Este campo debe ser mínimo de 20 caracteres.</p>
                            <p error='max'>Este campo debe ser máximo de 250 caracteres.</p>
                        </div>
                    </div>
                </div>
                <div class="space10"></div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <input type='submit' value='Enviar' class='col-md-12 button1 background-active-color'>
                    </div>
                </div>
                <div class="space10"></div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <a class='button10 col-md-12 text-center' v-on:click='putMyData("contactMail", false)'>Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</contactmailmodal>
