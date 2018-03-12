<div class="modal fade" id="campaignEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-sm">
        <div class="modal-container">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close circle-shape">
                    <span aria-hidden="true">×</span>
                </button>
                <h1 class="title1 text-center">{{ trans("groups.editCampaign") }}</h1>
            </div>
            <div class="modal-body">
                <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="formCampaingEdit">
                    {!! Form::open(['url' => 'updateCampaign', 'method' => 'post','enctype' => 'multipart/form-data', 'class' => 'form-custom', 'form-validation' => '']) !!}
                        <div class="row">
                            <label for="nameGroup" class="paragraph10">{{ trans("groups.nameCampaign") }}</label>
                        </div>
                        <div class="row">
                            <input type="text" name='nameCampaign' id="nameCampaign" class="col-xs-12 col-sm-12 col-md-12 validation" data-validations='["required", "max:50", "min:4"]'>
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
                            <textarea name='descriptionCampaign' id="descriptionCampaign" rows='8' class="col-xs-12 col-sm-12 col-md-12 validation"
                                      data-validations='["required", "min:50"]'></textarea>
                            <div class="msg" errors='descriptionCampaign'>
                                <p error='required'>Este campo es obligatorio.</p>
                                <p error='min'>Debes escribir almenos 50 caracteres.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 form-group not-padding">
                                <label for="lugar" class="label-control">Lugar</label>
                                <input type="hidden" name="coordinates" id='coordinates_edit'>
                                <input type="text" name="location" class="form-control validation"  data-validations='["required"]' id="place_edit">
                                <div id="map_canvas_edit" class="map"></div>
                                <a href="#suggestedSitesTab" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-map-marker" aria-hidden="true"></i> Ver listado de sitios sugeridos</a>
                            </div>
                        </div>

                        <div class="row">
                            <label for="quotasCampaign" class="paragraph10">{{ trans("groups.hours") }}</label>
                        </div>
                        <div class="row">
                            <input type="number" name='hoursCampaign' id="hoursCampaign" class="col-xs-12 col-sm-12 col-md-12 validation" min='0' data-validations='["required", "minNumber:1", "maxNumber:4"]'/>
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
                            <input type='text' name='dateCampaign' id="dateCampaign" class='datepick validation col-xs-12' data-validations='["required", "afterToday", "dateFormat"]' placeholder="aaaa-mm-dd">
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
                            <select name='categoryCampaign' id="categoryCampaign" class="col-xs-12 col-sm-12 col-md-12 categories validation"  data-validations='["required"]'>
                            </select>
                            <div class="msg" errors='categoryCampaign'>
                                <p error='required'>Debe seleccionar una opción</p>
                            </div>
                        </div>

                        <div class="row">
                            <input type="file" name="imageCampaign" id="imageCampaign"  class="boxPhoto1 col-xs-12 col-sm-12 col-md-12 preview validation">
                            <label for="imageCampaign" id="previewCampaign" class="text-center col-xs-12 col-sm-12">
                                <span>Sube una foto</span>
                            </label>
                            <div class="msg" errors='imageCampaign'>
                                <p error='required'>Debes subir una imagen.</p>
                            </div>
                        </div>
                        <div class="row">
                            <input type="hidden" name="campaign_id" id='campaignId'>
                            <button type="submit" class="col-xs-12  col-sm-12 button1 background-active-color">
                                {{trans('groups.publishCampaign')}}
                            </button>
                        </div>
                        <br>
                        <div class="row">
                            <button type="button" class="col-xs-12 button10 background-white text-center"  data-dismiss="modal">
                                {{trans('groups.cancel')}}
                            </button>
                        </div>
                    {!! Form::close() !!}
                </div>
                <div role="tabpanel" class="tab-pane" id="suggestedSitesTabEdit">
                    @include('profile.partial.suggestedSites')
                </div>
                <div role="tabpanel" class="tab-pane" id="detailSiteTabEdit">
                    @include('profile.partial.detailSite')                
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
