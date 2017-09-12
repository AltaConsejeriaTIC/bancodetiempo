<generalmodal  name='editService{{$service->id}}' :state='myData.editService{{$service->id}}' state-init='false'>
    <div slot="modal">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title titleContent">Actualizar estado de la oferta</h4>
              </div>

                    <div class="modal-body">

                        <div class="row">
                            <label for="serviceName{{$service->id}}">Nombre</label>
                        </div>
                        <div class="row">
                            <input type="text" name="serviceName" id='serviceName{{$service->id}}' value="{{$service->name}}" class="form-control">
                        </div>
                        <div class="row">
                            <label for="serviceDescription{{$service->id}}">Descripción</label>
                        </div>
                        <div class="row">
                            <textarea name="descriptionService" id="serviceDescription{{$service->id}}" rows="7"  class="form-control">{{$service->description}}</textarea>
                        </div>
                        <div class="row">
                            <label for="modality">Modalidad</label>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6">
                                <input type="checkbox" name="modalityServiceVirtually" value="1" id="modalityServiceVirtually{{$service->id}}" data-validations='["requiredIfNot:modalityServicePresently"]' class="square validation" @if($service->virtually == 1) checked @endif  class="form-control">
                                <label for="modalityServiceVirtually{{$service->id}}">Virtual</label>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <input type="checkbox" name="modalityServicePresently" value="1" id="modalityServicePresently{{$service->id}}" data-validations='["requiredIfNot:modalityServiceVirtually"]' class="square validation" @if($service->presently == 1) checked @endif  class="form-control">
                                <label for="modalityServicePresently{{$service->id}}">Presencial</label>
                            </div>
                        </div>
                        <div class="row">
                            <label for="hours">Valor servicio</label>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <input type="radio" class="circle" name="valueService" value="1" id='time1{{$service->id}}'  class="form-control" @if($service->value == 1) checked @endif>
                                <label for="time1{{$service->id}}"  >1 hora</label>
                            </div>
                            <div class="col-xs-6">
                                <input type="radio" class="circle" name="valueService" value="2" id='time2{{$service->id}}' class="form-control" @if($service->value == 2) checked @endif>
                                <label for="time2{{$service->id}}" >2 horas</label>
                            </div>
                            <div class="col-xs-6">
                                <input type="radio" class="circle" name="valueService" value="3" id='time3{{$service->id}}' class="form-control" @if($service->value == 3) checked @endif>
                                <label for="time3{{$service->id}}">3 horas</label>
                            </div>
                            <div class="col-xs-6">
                                <input type="radio" class="circle" name="valueService" value="4" id='time4{{$service->id}}' class="form-control" @if($service->value == 4) checked @endif>
                                <label for="time4{{$service->id}}">4 horas</label>
                            </div>

                        </div>
                        <div class="row">
                            <label for="category{{$service->id}}">Categoria</label>
                        </div>
                        <div class="row">
                            <select name="serviceCategory" id="category{{$service->id}}" class="form-control categories" option='{{$service->category_id}}'>
                            </select>
                        </div>
                        <div class="row form-custom">
                            <input type="file" name="imageService" id="imageService{{$service->id}}" class="boxPhoto1 col-xs-12 col-sm-12 col-md-12 validation preview">
                            <label for="imageService{{$service->id}}" class="text-center col-xs-12 col-sm-12" style='background-image:url("/{{$service->image}}")'>
                            <span>Sube una foto</span></label>
                        </div>
                        <div class="row">
                           <input type="hidden" name="service_id" value="{{$service->id}}">
                            <button type="submit" class="btn btn-raised btn-success" title="Actualizar"><i class="material-icons">done_all</i><div class="ripple-container"></div></button>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</generalmodal>
