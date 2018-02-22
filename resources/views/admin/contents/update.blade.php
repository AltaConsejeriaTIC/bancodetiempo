<div id="update-dialog{{$cont->id}}" class="modal fade" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title titleContent">Actualizar Contenido</h4>
            </div>
            {!!Form::model($cont, ['route' => 'homeAdminContents/update', 'method'=> 'put', 'files' => 'true'])!!}
            <div class="modal-body">
                <div class="row">
                    {!!Form::hidden('id', $cont->id)!!}
                    <div class="form-group col-md-10">
                        {!! Form::label('name','Nombre')!!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required'])!!}
                    </div>

                    <div class="form-group col-md-12" >
                        {!!Form::label('content', 'Contenido')!!}
                        {!!Form::textarea('content',$cont->description, ['class' => 'form-control editor', 'required' => 'required'])!!}
                    </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-raised btn-success" title="Actualizar"><i class="fa fa-done"></i> Actualizar</button>
            </div>
        </div>
        {!! Form::close()!!}
    </div>
</div>

