<div class="modal fade" id="update-dialog{{$campaign->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reportar contenido</h5><br>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['url' => '/campaign-report/create/'.$campaign->id, 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'form']) !!}
      <div class="modal-body">
        <h6 class="modal-title" id="exampleModalLabel">Oferta: {{$campaign->name}}</h6>
        <div class="row form-group">
            <div class="col-12" >
                {!!Form::label('Categotia', '¿Cual es el problema?',[])!!}
                {!!Form::select('list', $listTypes , 'l', [ 'required' => "required", 'class' => 'form-control'])!!}
            </div>
            <div class="col-12" >
                {!!Form::label('Observación', 'Observación',[])!!}
                {!!Form::textarea('observacion',null, ['class' => 'form-control', 'required' => "required", "min:50", "max:250"])!!}
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Reportar</button>
      </div>
      {!! Form::close()!!}
    </div>
  </div>
</div>