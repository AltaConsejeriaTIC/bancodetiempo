<div id="update-dialog{{$category->id}}" class="modal fade" tabindex="-1" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title titleContent">Actualizar Categoría</h4>
      </div>
      {!!Form::model($category, ['route' => 'homeAdminCategory/update', 'method'=> 'put', 'files' => 'true'])!!}
				<div class="modal-body">
					<div class="row">
            {!!Form::hidden('id', $category->id)!!}
						<div class="form-group col-md-10">
              {!! Form::label('category','Nombre')!!}
              {!! Form::text('category', null, ['class' => 'form-control', 'required' => 'required'])!!}
            </div>

            <div class="form-group col-md-10">
              {!! Form::label('image','Imagen')!!}
              <input type="text" readonly="" class="form-control" placeholder="Examinar...">
              {!! Form::file('image', null, ['class' => 'form-control'])!!}
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