<div class="modal fade" id="serviceDetail" tabindex="-1" role="dialog" aria-labelledby="serviceDetail" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-capitalize" id="d-name"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-3">
                <img src="" id="d-cover">
                <hr>
                <h4 id="d-user-name"></h4>
                <img src="" id="d-avatar">
            </div>
            <div class="col-6">
                <h4>Descripción</h4>
                <p id="d-description"></p>
                <h4>Modalidad</h4>
                <p><span id="d-modalidad-p" class="d-none">Precencial</span> <span id="d-modalidad-v" class="d-none">Virtual</span></p>
                <h4>Valor</h4>
                <p><span id="d-value"></span> Dorados</p>
                <h4>Estado</h4>
                <p><span id="d-state"></span> <button type="button" id='editState' class="btn btn-primary"><i class="fa fa-edit"></i></button></p>
            </div>
            <div class="col-3">
                <div class="progress" id="d-animacion">
                    <span class="progress-left">
                        <span class="progress-bar"></span>
                    </span>
                    <span class="progress-right">
                        <span class="progress-bar"></span>
                    </span>
                    <div class="progress-value" id="d-ranking"></div>
                </div>
            </div>
        </div>
        <div class="row py-4">
            <table class="table table-hover">
               <thead>
                   <tr>
                       <th>Demandante</th>
                       <th>Dorados</th>
                       <th>Lugar</th>
                       <th>Fecha</th>
                       <th>Descripción</th>
                       <th>Estado</th>
                       <th>Fecha creación</th>
                   </tr>
               </thead>

               <tbody id="d-deals">

               </tbody>

            </table>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="d-id">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
