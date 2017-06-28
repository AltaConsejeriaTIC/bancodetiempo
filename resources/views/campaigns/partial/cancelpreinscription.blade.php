<generalmodal name='cancelpreinscription' :state='myData.cancelpreinscription' state-init='false'>
    <div slot="modal" class='popup-dialog'>
        <button type="button" @click='myData.cancelpreinscription = false' class="close circle-shape"><span
                    aria-hidden="true">×</span></button>
        {!! Form::open(['url' => 'cancelPreinscriptionParticipant', 'method' => 'post','enctype' => 'multipart/form-data', 'class' => 'form-custom', 'form-validation' => '']) !!}
        <div class="row">
            <h1 class="title text-center">Cancelar pre-inscripcion a la campaña</h1>
        </div>
        <div class="row">
            <h1 class="message text-center">¿Deseas cancelar tu pre-inscripcion a la campaña “{{$campaign->name}}”?</h1>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="button1 button ok-button">
                    Aceptar
                </button>
            </div>
            <div class="col-xs-12 text-center">
                <button type="button" class="button1 button cancel-button" @click='myData.cancelpreinscription = false'>
                    {{trans("campaigns.cancel")}}
                </button>
            </div>
        </div>
        <input type="hidden" name="campaign_id" value="{{$campaign->id}}">
        {!! Form::close() !!}
    </div>
</generalmodal>
