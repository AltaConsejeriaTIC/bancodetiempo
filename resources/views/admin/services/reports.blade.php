<div id="reports-dialog{{$service->id}}" class="modal fade" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title titleContent">Reportes de la oferta</h4>
            </div>
            <div class="modal-body">

                <table id="otratabla" class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Categoria</th>
                        <th>Observación</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($service->reports as $repo)
                        <tr>
                            <td>{{ $repo->name }}</td>
                            <td>{{ $repo->description }}</td>
                            <td>{{ $repo->state->state }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
