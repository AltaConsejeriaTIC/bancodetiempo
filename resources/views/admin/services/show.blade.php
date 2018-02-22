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
            </div>
            <div class="col-6">
                <h4>Descripción</h4>
                <p id="d-description"></p>
                <h4>Modalidad</h4>
                <p><span id="d-modalidad-p" class="d-none">Precencial</span> <span id="d-modalidad-v" class="d-none">Virtual</span></p>
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
