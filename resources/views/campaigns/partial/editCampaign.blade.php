<generalmodal name='editCampaign{{$campaign->id}}' :state='myData.editCampaign{{$campaign->id}}' state-init='false'>
    <div slot="modal" class='modal-container'>
        <button type="button" @click='myData.editCampaign{{$campaign->id}} = false' class="close circle-shape"><span
                    aria-hidden="true">×</span></button>
        {!! Form::open(['url' => 'updateCampaign', 'method' => 'post','enctype' => 'multipart/form-data', 'class' => 'form-custom', 'form-validation' => '']) !!}
        <div class="row">
            <h1 class="title1 text-center">{{ trans("groups.editCampaign") }}</h1>
        </div>
        <div class="row">
            <label for="nameCampaign" class="paragraph10">{{ trans("groups.nameCampaign") }}</label>
        </div>
        <div class="row">
            <input type="text" name='nameCampaign' class="col-xs-12 col-sm-12 col-md-12 validation"
                   data-validations='["required", "max:50", "min:4"]' value="{{$campaign->name}}">
        </div>
        <div class="row">
            <label for="descriptionCampaign" class="paragraph10">{{ trans("groups.descriptionCampaign") }}</label>
        </div>
        <div class="row">
            <textarea name='descriptionCampaign' rows='8' class="col-xs-12 col-sm-12 col-md-12 validation"
                      data-validations='["required", "min:50"]'>{{$campaign->description}}</textarea>
        </div>
        <div class="row">
            <label for="quotasCampaign" class="paragraph10">{{ trans("groups.hours") }}</label>
        </div>
        <div class="row">
            <input type="number" name='hoursCampaign' class="col-xs-12 col-sm-12 col-md-12 validation" min='0'
                   data-validations='["required", "minNumber:1"]' value="{{$campaign->hours}}"/>
        </div>
        <div class="row">
            <label for="dateCampaign" class="paragraph10">{{ trans("groups.date") }}</label>
        </div>
        <div class="row">
            <input type='text' name='dateCampaign' class='datepick validation'
                   data-validations='["required", "afterToday"]' value="{{explode(" ", $campaign->date)[0]}}">
            <div class="msg" errors='dateCampaign'>
                <p error='required'>Este campo es obligatorio.</p>
                <p error='min'>Debes ser mayor de edad para registrarte en Cambalachea.</p>
            </div>
        </div>

        <div class="row">
            <label for="timeCampaign" class="paragraph10">{{ trans("groups.time") }}</label>
        </div>
        <div class="row">
            <input type="time" name="timeCampaign" id="timeCampaign" placeholder="hh:mm" class="validation"
                   data-validations='["required", "time"]' value="{{explode(" ", $campaign->date)[1]}}">
            <div class="msg" errors='timeCampaign'>
                <p error='time'>El formato no es valido.</p>
            </div>
        </div>

        <div class="row">
            <label for="categoryCampaign" class="paragraph10">{{ trans("groups.category") }}</label>
        </div>
        <div class="row">
            <select name='categoryCampaign' class="col-xs-12 col-sm-12 col-md-12 categories validation"
                    data-validations='["required"]' option="{{$campaign->category->id}}">
            </select>
            <div class="msg" errors='categoryCampaign'>
                <p error='required'>Debe seleccionar una opción</p>
            </div>
        </div>

        <div class="row">
            <input type="file" name="imageCampaign" id="imageCampaign{{$campaign->id}}"
                   class="boxPhoto1 col-xs-12 col-sm-12 col-md-12 preview validation">
            <label for="imageCampaign{{$campaign->id}}" class="text-center col-xs-12 col-sm-12"
                   style="background-image: url('/{{$campaign->image}}');">
                <span>Sube una foto</span>
            </label>
        </div>
        <div class="row">
            <input type="hidden" name='campaign_id' value="{{$campaign->id}}">
            <button type="submit" class="col-xs-12  col-sm-12 button1 background-active-color">
                {{trans('groups.editCampaign')}}
            </button>
        </div>
        <br>
        <div class="row">
            <button class="col-xs-12 button10 background-white text-center" @click='myData.editCampaign{{$campaign->id}} = false'>
                {{trans('groups.cancel')}}
            </button>
        </div>
        {!! Form::close() !!}

    </div>
</generalmodal>
