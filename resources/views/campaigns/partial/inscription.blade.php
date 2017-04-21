<generalmodal  name='inscription' :state='myData.inscription' state-init='false'>
    <div slot="modal" class='modal-container'>
        <button type="button" @click='myData.inscription = false' class="close circle-shape"><span aria-hidden="true">×</span></button>
        {!! Form::open(['url' => 'inscriptionParticipant', 'method' => 'post','enctype' => 'multipart/form-data', 'class' => 'form-custom', 'form-validation' => '']) !!}
            <div class="row">
                <h1 class="title1 text-center">{{ trans("campaigns.textInscription") }}</h1>
            </div>
            <div class="row">
               <input type="hidden" name="campaign_id" value="{{$campaign->id}}">
                <button type="submit" class="col-xs-12  col-sm-12 button1 background-active-green-color" >
                    {{trans("campaigns.inscription")}}
                </button>
            </div>
            <br>
            <div class="row">
                <button type="button" class="col-xs-12 button10 background-white text-center" @click='myData.inscription = false'>
                    {{trans("campaigns.cancel")}}
                </button>
            </div>
        {!! Form::close() !!}
    </div>
</generalmodal>
