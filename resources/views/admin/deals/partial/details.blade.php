<generalmodal  name='deal{{$deal->id}}' :state='myData.deal{{$deal->id}}' state-init='false'>
    <div slot="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title titleContent">Trato {{$deal->id}}</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h3>Servicio</h3>
                    </div>
                    <div class="row">
                        <p>{{$deal->service->name}}</p>
                    </div>
                    <div class="row">
                        <h3>Demandante</h3>
                    </div>
                    <div class="row">
                        <p>{{$deal->user->first_name." ".$deal->user->last_name}}</p>
                    </div>
                    <div class="row">
                        <h3>Ofertante</h3>
                    </div>
                    <div class="row">
                        <p>{{$deal->service->user->first_name." ".$deal->service->user->last_name}}</p>
                    </div>
                    <div class="row">
                        <h3>Fecha</h3>
                    </div>
                    <div class="row">
                        <p>{{$deal->date." ".$deal->time}}</p>
                    </div>
                    <div class="row">
                        <h3>Valor</h3>
                    </div>
                    <div class="row">
                        <p>{{$deal->value}} Dorados</p>
                    </div>
                    <div class="row">
                        <h3>Descripcion</h3>
                    </div>
                    <div class="row">
                        <p>{{$deal->description}}</p>
                    </div>
                    <div class="row">
                        <h3>Lugar</h3>
                    </div>
                    <div class="row">
                        <p>{{$deal->location}}</p>
                    </div>
                    <div class="row">
                        <h3>Estado</h3>
                    </div>
                    <div class="row">
                        <p>{{$deal->dealStates->last()->state->state}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</generalmodal>
