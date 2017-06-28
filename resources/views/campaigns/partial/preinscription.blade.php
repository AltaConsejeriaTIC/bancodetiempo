<generalmodal  name='cancelpreinscription' :state='myData.cancelpreinscription' state-init='false'>
    <div slot="modal" class='modal-container'>
        <button type="button" @click='myData.cancelpreinscription = false' class="close circle-shape"><span aria-hidden="true">×</span></button>
        {!! Form::open(['url' => 'cancelPreinscriptionParticipant', 'method' => 'post','enctype' => 'multipart/form-data', 'class' => 'form-custom', 'form-validation' => '']) !!}
            <div class="row">
                <h1 class="title1 text-center">¿Deseas cancelar tu pre-inscripcion a la campaña “{{$campaign->name}}”?</h1>
            </div>
            <div class="row">
               <input type="hidden" name="campaign_id" value="{{$campaign->id}}">
                <button type="submit" class="col-xs-12  col-sm-12 button1 background-active-green-color" >
                    Aceptar
                </button>
            </div>
            <br>
            <div class="row">
                <button type="button" class="col-xs-12 button10 background-white text-center" @click='myData.cancelpreinscription = false'>
                    {{trans("campaigns.cancel")}}
                </button>
            </div>
        {!! Form::close() !!}
    </div>
</generalmodal>
