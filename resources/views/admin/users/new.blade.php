<div id="new-dialog" class="modal fade" tabindex="-1" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title titleContent">Registrar Usuario Administrador</h4>
      </div>
      {!! Form::open(['route' => 'admin.store', 'method'=> 'post'])!!}
				<div class="modal-body">									
					<div class="row">
						<div class="form-group col-md-10">
              <label for="first_name">Nombres</label>
              <input id="first_name" type="text" class="form-control" name="first_name" required autofocus>               
            </div>

            <div class="form-group col-md-10">
              <label for="last_name">Apellidos</label>
              <input id="last_name" type="text" class="form-control" name="last_name" required >               
            </div>

            <div class="form-group col-md-10">
              <label for="email">E-Mail</label>
              <input id="email" type="email" class="form-control" name="email" required >               
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