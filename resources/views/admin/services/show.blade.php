
<div id="show-dialog{{$service->id}}" class="modal fade" tabindex="-1" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="panel-heading modal-title titleContent text-center">Información de la Oferta<br>{{$service->name}}  </h4>
        </div>
        <div class="modal-body">
            <div class="panel panel-primary modalPanel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <img src="{{$service->image}}" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <p><strong>Descripción</strong></p>
                            <p class="paragraph1">{{$service->description}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <p><strong>Ranking</strong></p>
                            <p>{{$service->ranking}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <p><strong>Valor</strong></p>
                            <p>{{$service->value}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <p><strong>Madalidad</strong></p>
                            <p>@if($service->virtually == 1) Virtual @endif  @if($service->presently == 1) Presencial @endif</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <p><strong>Categoria</strong></p>
                            <p>{{$service->category->category}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <p><strong>Usuario</strong></p>
                            <p>{{$service->user->first_name." ".$service->user->last_name}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <p><strong>Estado</strong></p>
                            <p>{{$service->state->state}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <p><strong>Fecha de creación</strong></p>
                            <p>{{$service->created_at}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <p><strong>Ultima actualización</strong></p>
                            <p>{{$service->updated_at}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
