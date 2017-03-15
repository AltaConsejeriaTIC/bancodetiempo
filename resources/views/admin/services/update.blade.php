<div id="update-dialog{{$service->id}}" class="modal fade" tabindex="-1" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title titleContent">Actualizar estado de la oferta</h4>
      </div>
      {!!Form::model($service, ['route' => 'homeAdminServices/update', 'method'=> 'put'])!!}
        <div class="modal-body">
			<div class="row">
             {!!Form::hidden('id', $service->id)!!}
            <div class="form-group col-md-10">
              {!! Form::label('state','Estado')!!}
              {!!Form::select('state_id', $states, null, ['class' => 'form-control', 'required' => 'required'])!!}              
            </div>
            					  
				  </div>
				<div class="modal-footer">					
					<button type="submit" class="btn btn-raised btn-success" title="Actualizar"><i class="material-icons">done_all</i></button>					
				</div>
				</div>
			{!! Form::close()!!}
    </div>
  </div>
</div>