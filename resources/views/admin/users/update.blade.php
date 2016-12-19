<div id="update-dialog{{$user->id}}" class="modal fade" tabindex="-1" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title titleContent">Actualizar Usuario</h4>
      </div>
      {!!Form::model($user, ['route' => 'homeAdmin/update', 'method'=> 'put'])!!}
				<div class="modal-body">									
					<div class="row">            
            {!!Form::hidden('id', $user->id)!!}
						<div class="form-group col-md-10">
              {!! Form::label('first_name','Nombres')!!}
              {!! Form::text('first_name', null, ['class' => 'form-control', 'required' => 'required'])!!}                           
            </div>

            <div class="form-group col-md-10">
              {!! Form::label('last_name','Apellidos')!!}
              {!! Form::text('last_name',null, ['class' => 'form-control', 'required' => 'required'])!!}                          
            </div>

            <div class="form-group col-md-10">
              {!! Form::label('email','E-mail')!!}
              {!! Form::email('email',null, ['class' => 'form-control', 'required' => 'required'])!!}              
            </div>

            <div class="form-group col-md-10">
              {!! Form::label('state','Estado')!!}
              {!!Form::select("state", [''=> $user->state == 1 ? 'Activo' : 'Inactivo','1'=>'Activo', '0'=>'Inactivo'], null, ['class' => 'form-control'])!!}
            </div>
            					  
				  </div>
				<div class="modal-footer">					
					<button type="submit" class="btn btn-raised btn-success"><i class="material-icons">done_all</i></button>					
				</div>
				</div>
			{!! Form::close()!!}
    </div>
  </div>
</div>