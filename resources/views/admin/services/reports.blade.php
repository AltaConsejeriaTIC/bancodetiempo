<div id="reports-dialog{{$service->id}}" class="modal fade" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title titleContent">Reportes de la oferta</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <p class="col-xs-4">Usuario</p>
                    <p class="col-xs-4">Categoria</p>
                    <p class="col-xs-4">Observación</p>
                </div>

                @foreach($service->reports as $repo)
                    <div class="row">
                        <p class="col-xs-4">{{ $repo->user->first_name }} {{ $repo->user->last_name }}</p>
                        <p class="col-xs-4">{{ $repo->type_report->type }}</p>
                        <p class="col-xs-4">{{ $repo->observation }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
