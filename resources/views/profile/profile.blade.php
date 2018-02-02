@extends('layouts.app')


@section('content')

@include('nav',array('type' => 2))
    
<div class="row">

    <div class="container">

        @include('profile.partial.detailProfile')

        <ul class="nav nav-pills col-md-8 col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-0">
            <li class="active">
                <a href="#tabServices" data-toggle="tab" class="paragraph1">{{ trans('profile.services') }}</a>
            </li>
            <li>
                <a href="#tabCampaings" data-toggle="tab" class="paragraph1">{{ trans('profile.campaigns') }}</a>
            </li>
        </ul>

        <div class="tab-content clearfix col-md-8 col-sm-6 col-xs-12">
            <div class="tab-pane active" id="tabServices">
                @include('profile.partial.tabService')
            </div>

	       <div class="tab-pane" id="tabCampaings">
                @include('profile.partial.tabCampaigns')
            </div>
        </div>

        <div class="row visible-xs">
            <div class="col-xs-12">
                 {!! Form::open(['url' => 'deactivateAccount', 'method' => 'post', 'class' => 'form-custom col-xs-12 col-sm-12']) !!}
                    <input type="hidden" name="token" value="{{ csrf_token() }}">
                    <deactivate></deactivate>
                {!! Form::close() !!}
                <button class="col-xs-10 col-xs-offset-1 button10 background-white" data-toggle="modal" data-target="#deactivate">{{ trans('profile.desactiveAccount') }}</button>
            </div>
        </div>

    </div>

</div>

@include("profile/partial/formNewCampaign")
@include('campaigns/partial/editCampaign')

@section('script')
    <script src="{{ asset('js/mapsFunctions.js') }}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPGPS5eThFsyJBtOl7RYlaFEp4HLRKKWA&libraries=places"></script>
    <script>
        jQuery(document).ready(function(){
            jQuery(".showEditCampaign").on("click", showEditCampaign)
        });
        function showEditCampaign(){
            var campaign = jQuery(this).data('campaign');
            jQuery.ajax({
                url : "getCampaign/"+campaign,
                method : "get",
                success : function(data){
                    console.log(data)
                    jQuery("#campaignEdit").find("#nameCampaign").val(data.name)
                    jQuery("#campaignEdit").find("#descriptionCampaign").val(data.description)
                    jQuery("#campaignEdit").find("#coordinates_edit").val(data.coordinates)
                    jQuery("#campaignEdit").find("#place_edit").val(data.location)
                    jQuery("#campaignEdit").find("#hoursCampaign").val(data.hours)
                    jQuery("#campaignEdit").find("#dateCampaign").val(data.date.split(" ")[0])
                    jQuery("#campaignEdit").find("#timeCampaign").val(data.date.split(" ")[1].slice(0, -3))
                    jQuery("#campaignEdit").find("#categoryCampaign option").each(function(){
                        if(jQuery(this).val() == data.category_id){
                            jQuery(this).prop("selected", true)
                        }
                    });
                    jQuery("#previewCampaign").css({"background-image" : "url('"+data.image+"')"});
                    jQuery("#campaignEdit").find("#campaignId").val(data.id)
                }
            });
            var el = jQuery("#campaignEdit");
        }
    </script>
@endsection

@endsection
