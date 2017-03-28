
@if(session('report'))
    <generalmodal  name='notificationReport' :state='myData.notificationReport' state-init='true'>
        <div slot="modal" class='box row'>
            <button type="button" class='close'  v-on:click='myData.notificationReport = false'><i class='fa fa-close'></i></button>
            <h1 class='title1 col-md-12 text-center'>¡Reporte enviado!</h1>
            <p class='text-center col-md-12'>Tu reporte se ha realizado con exito.</p>
            <p class='text-center col-md-12 title1'>
                <i class="fa fa-signal" aria-hidden="true" style='font-size: 60px;font-size: 50px;transform: rotateZ(-90deg) translateX(40px) translateY(-10px);'></i><i class="fa fa-envelope" aria-hidden="true" style='font-size: 120px;'></i>
            </p>
        </div>
    </generalmodal>
@endif

@if(session('reportOk'))
    <generalmodal  name='notificationReportOk' :state='myData.notificationReportOk' state-init='true'>
        <div slot="modal" class='box row'>
            <button type="button" class='close'  v-on:click='myData.notificationReportOk = false'><i class='fa fa-close'></i></button>
            <h1 class='title1 col-md-12 text-center'>¡Ya reportaste esta oferta anteriormente!</h1>
            <p class='text-center col-md-12'>Gracias por ayudar en nuestra comunidad.</p>
            <p class='text-center col-md-12 title1'>
                <i class="fa fa-signal" aria-hidden="true" style='font-size: 60px;font-size: 50px;transform: rotateZ(-90deg) translateX(40px) translateY(-10px);'></i><i class="fa fa-envelope" aria-hidden="true" style='font-size: 120px;'></i>
            </p>
        </div>
    </generalmodal>
@endif
<div id="update-dialog{{$service->id}}" class="modal fade" tabindex="-1" style="display: none;">
    <div class="modal-box" role="document">
        <div class="modal-content-box">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <div class="modal-header">
                        <button type="button" class="close circle-shape" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['url' => '/report/create/'.$service->id, 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'form', 'class' => 'form-custom col-xs-12 col-sm-12']) !!}
                        <div class="row">
                            <p class="modal-title titleContent text-center title1 ">Reportar contenido</p>
                            <p class="modal-title titleContent text-center title4">Oferta: {{$service->name}}</p>
                            <p class="modal-title titleContent text-center "><i class=" material-icons report_icon" aria-hidden="true">report</i><h1>
                        </div>
                            <div class="row ">
                                <div class="col-md-12" >
                                    {!!Form::label('Categotia', '¿Cual es el problema?',['class' => 'paragraph10 text-center'])!!}
                                    {!!Form::select('list', $listTypes , 'l', [ 'required' => "required"])!!}

                                </div>
                                <div class="col-md-12" >
                                    {!!Form::label('Observación', 'Observación',['class' => 'paragraph10 text-center'])!!}
                                    {!!Form::textarea('observacion',null, ['class' => 'countCharacters col-xs-12 col-sm-12 col-md-12 validation', 'required' => "required", "min:50", "max:250"])!!}
                                </div>
                            </div>
                            <button type="submit" class="col-xs-12  col-sm-12 button1 background-active-color" title="Reportar">
                                Reportar
                            </button>
                            <div class="space10">
                            </div>
                              <button class="col-xs-12 button10 background-white text-center" data-dismiss="modal" aria-label="Close">
                            Cancelar
                             </button>
                        {!! Form::close()!!}
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>


