<generalmodal name='deleteCampaign' :state='myData.deleteCampaign' state-init='false'>
    <div slot="modal" class='modal-container'>
        <button type="button" @click='myData.deleteCampaign = false' class="close circle-shape"><span
                    aria-hidden="true">×</span></button>
        {!! Form::open(['url' => 'deleteCampaign/'.$campaign->id, 'method' => 'put','enctype' => 'multipart/form-data', 'class' => 'form-custom', 'form-validation' => '']) !!}
        <div class="row">
            <h1 class="title1 text-center">{{ trans("groups.questionDelete") }}</h1>
        </div>
        <div class="row">
            <input type="hidden" name="campaign_id" value="{{$campaign->id}}">
            <button type="submit" class="col-xs-12  col-sm-12 button1 background-active-color">
                {{trans("groups.yes")}}
            </button>
        </div>
        <br>
        <div class="row">
            <button type="button" class="col-xs-12 button10 background-white text-center"
                    @click='myData.deleteCampaign = false'>
                {{trans("groups.not")}}
            </button>
        </div>
        {!! Form::close() !!}
    </div>
</generalmodal>