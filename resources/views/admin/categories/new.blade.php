<div id="new-dialog" class="modal fade" tabindex="-1" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title titleContent">Registrar Categorías</h4>
      </div>
      {!! Form::open(['route' => 'homeAdminCategory.store', 'method'=> 'post', 'files' => 'true'])!!}
				<div class="modal-body">									
					<div class="row">
						<div class="form-group col-md-10">
              <label for="category">Categoría</label>
              <input id="category" type="text" class="form-control" name="category" value="{{ old('category') }}" required autofocus>               
            </div>

            <div class="form-group col-md-10">
              <label for="image">Imágen</label>
              <input type="text" readonly="" class="form-control" placeholder="Examinar...">
              <input type="file" name="image">              
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