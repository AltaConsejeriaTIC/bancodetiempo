<div id="update-dialog" class="modal fade" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title titleContent">Actualizar Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">									
                <form action="" id="updateUser">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-12 form-group">
                            <input type="text" name="name" value="" id="i-name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 form-group">
                            <input type="text" name="lastname" value="" id="i-lastname" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 form-group">
                            <input type="text" name="email" value="" id="i-email" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 form-group">
                            <select  name="state" id="i-state" class="form-control">
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                                <option value="3">Bloqueado</option>
                                <option value="4">Pendiente</option>
                            </select>
                        </div>
                    </div>
               <input type="hidden" name="id" id="i-id">				
                </form>
            </div>
            <div class="modal-footer">	
                <button type="button" class="btn btn-raised btn-success" title="Actualizar" onclick="updateUser();"><i class="fa fa-check"></i></button>					
            </div>
        </div>
    </div>
</div>