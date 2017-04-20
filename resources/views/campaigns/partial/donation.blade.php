<generalmodal  name='donation' :state='myData.donation' state-init='false'>
    <div slot="modal" class='modal-container'>
        <button type="button" @click='myData.newcampaign = false' class="close circle-shape"><span aria-hidden="true">×</span></button>
        {!! Form::open(['url' => 'donation', 'method' => 'post','enctype' => 'multipart/form-data', 'class' => 'form-custom', 'form-validation' => '']) !!}
            <div class="row">
                <h1 class="title1 text-center">{{ trans("campaigns.questionDonation") }}</h1>
            </div>
             <div class="row">
                <label for="quotasCampaign" class="paragraph10">{{ trans("nav.credits") }}</label>
            </div>
            <div class="row">
                <input type="number" name='credits' class="col-xs-12 col-sm-12 col-md-12 validation" data-validations='["required", "minNumber:1", "maxNumber:{{Auth::user()->credits-1}}"]' />
                <div class="msg" errors='credits'>
                    <p error='required'>Este campo es obligatorio.</p>
                    <p error='minNumber'>{{ trans("campaigns.errorMinDonation") }}</p>
                    <p error='maxNumber'>{{ trans("campaigns.errorMaxDonation") }}</p>
                </div>
            </div>
            <div class="row">
               <input type="hidden" name="group_id" value="{{$campaign->id}}">
                <button type="submit" class="col-xs-12  col-sm-12 button1 background-active-color" >
                    {{trans("campaigns.submit")}}
                </button>
            </div>
            <br>
            <div class="row">
                <button class="col-xs-12 button10 background-white text-center" @click='myData.donation = false'>
                    {{trans("campaigns.cancel")}}
                </button>
            </div>
        {!! Form::close() !!}
    </div>
</generalmodal>
