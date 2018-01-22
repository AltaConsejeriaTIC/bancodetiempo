@if(!$campaign->campaignEnableInSchool())
    <button type="button" class="btn btn-success btn_campaign_add" data-campaign='{{$campaign->id}}' data-name='{{$campaign->name}}' data-toggle="modal" data-target="#modal_habilitar"><i class="fa fa-check"></i></button>
@else
    <button type="button" class="btn btn-danger btn_campaign_remove" data-campaign='{{$campaign->id}}' data-name='{{$campaign->name}}' data-toggle="modal" data-target="#modal_deshabilitar">
        <i class="fa fa-close"></i>
    </button>
@endif