<generalmodal name='newcampaign' :state='myData.newcampaign' state-init='false'>
    <div slot="modal" class='modal-container'>
        <button type="button" @click='myData.newcampaign = false' class="close circle-shape"><span aria-hidden="true">×</span></button>
        <h1 class="title1 text-center">{{ trans("groups.newCampaign") }}</h1>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="formCampaing">
                {!! Form::open(['url' => 'createCampaign', 'method' => 'post','enctype' => 'multipart/form-data', 'class' => 'form-custom', 'form-validation' => '']) !!}
                    <div class="row">
                        <label for="nameGroup" class="paragraph10">{{ trans("groups.nameCampaign") }}</label>
                    </div>
                    <div class="row">
                        <input type="text" name='nameCampaign' class="col-xs-12 col-sm-12 col-md-12 validation" data-validations='["required", "max:50", "min:4"]'>
                        <div class="msg" errors='nameCampaign'>
                            <p error='required'>Este campo es obligatorio.</p>
                            <p error='min'>Debes escribir almenos 4 caracteres.</p>
                            <p error='max'>Puedes escribir 50 caracteres como máximo.</p>
                        </div>
                    </div>
                    <div class="row">
                        <label for="descriptionCampaign" class="paragraph10">{{ trans("groups.descriptionCampaign") }}</label>
                    </div>
                    <div class="row">
                        <textarea name='descriptionCampaign' rows='8' class="col-xs-12 col-sm-12 col-md-12 validation"
                                  data-validations='["required", "min:50"]'></textarea>
                        <div class="msg" errors='descriptionCampaign'>
                            <p error='required'>Este campo es obligatorio.</p>
                            <p error='min'>Debes escribir almenos 50 caracteres.</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group not-padding">
                            <label for="lugar" class="label-control">Lugar</label>
                            <input type="hidden" name="coordinates" id='coordinates'>
                            <input type="text" name="location" class="form-control validation"  data-validations='["required"]' id="place">
                            <div id="map_canvas" class="map"></div>
                            <a href="#suggestedSitesTab" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-map-marker" aria-hidden="true"></i> Ver listado de sitios sugeridos</a>
                        </div>
                    </div>

                    <div class="row">
                        <label for="quotasCampaign" class="paragraph10">{{ trans("groups.hours") }}</label>
                    </div>
                    <div class="row">
                        <input type="number" name='hoursCampaign' class="col-xs-12 col-sm-12 col-md-12 validation" min='0'
                               data-validations='["required", "minNumber:1", "maxNumber:4"]'/>
                        <div class="msg" errors='hoursCampaign'>
                            <p error='required'>Este campo es obligatorio.</p>
                            <p error='minNumber'>El mínimo número de horas es 1.</p>
                            <p error='maxNumber'>El máximo número de horas es 4.</p>
                        </div>
                    </div>
                    <div class="row">
                        <label for="dateCampaign" class="paragraph10">{{ trans("groups.date") }}</label>
                    </div>
                    <div class="row">
                        <input type='text' name='dateCampaign' class='datepick validation col-xs-12' data-validations='["required", "afterToday", "dateFormat"]' placeholder="aaaa-mm-dd">
                        <div class="msg" errors='dateCampaign'>
                            <p error='required'>Este campo es obligatorio.</p>
                            <p error='afterToday'>La fecha de la campaña debe estar despues de hoy.</p>
                            <p error='dateFormat'>Este campo debe tener el formato aaaa-mm-dd.</p>
                        </div>
                    </div>

                    <div class="row">
                        <label for="timeCampaign" class="paragraph10">{{ trans("groups.time") }}</label>
                    </div>
                    <div class="row">
                        <input type="time" name="timeCampaign" id="timeCampaign" placeholder="hh:mm" class="validation col-xs-12"
                               data-validations='["required", "time"]'>
                        <div class="msg" errors='timeCampaign'>
                            <p error='required'>Este campo es obligatorio.</p>
                            <p error='time'>El formato no es valido.</p>
                        </div>
                    </div>

                    <div class="row">
                        <label for="categoryCampaign" class="paragraph10">{{ trans("groups.category") }}</label>
                    </div>
                    <div class="row">
                        <select name='categoryCampaign' class="col-xs-12 col-sm-12 col-md-12 categories validation"
                                data-validations='["required"]'>
                        </select>
                        <div class="msg" errors='categoryCampaign'>
                            <p error='required'>Debe seleccionar una opción</p>
                        </div>
                    </div>

                    <div class="row">
                        <input type="file" name="imageCampaign" id="imageCampaign"
                               class="boxPhoto1 col-xs-12 col-sm-12 col-md-12 preview validation"
                               data-validations='["required"]'>
                        <label for="imageCampaign" class="text-center col-xs-12 col-sm-12">
                            <span>Sube una foto</span>
                        </label>
                        <div class="msg" errors='imageCampaign'>
                            <p error='required'>Debes subir una imagen.</p>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="col-xs-12  col-sm-12 button1 background-active-color">
                            {{trans('groups.publishCampaign')}}
                        </button>
                    </div>
                    <br>
                    <div class="row">
                        <button class="col-xs-12 button10 background-white text-center" @click='myData.newcampaign = false'>
                            {{trans('groups.cancel')}}
                        </button>
                    </div>
                {!! Form::close() !!}
            </div>
            <div role="tabpanel" class="tab-pane" id="suggestedSitesTab">
                @include('profile.partial.suggestedSites')
            </div>
            <div role="tabpanel" class="tab-pane" id="detailSiteTab">
                @include('profile.partial.detailSite')                
            </div>
        </div>
    </div>
</generalmodal>

