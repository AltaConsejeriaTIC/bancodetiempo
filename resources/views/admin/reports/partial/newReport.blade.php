<generalmodal name='newreport' :state='myData.newreport' state-init='false'>
    <div slot="modal" class='modal-container'>
        <form action="/admin/createReport" method="post">
           {{ csrf_field() }}
            <div class="row">
                <h4 class="title1">Nuevo reporte</h4>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label for="nameReport">Nombre del reporte</label>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <input type="text" name="nameReport" class="col-xs-12">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label for="nameReport">Descripción del reporte</label>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <textarea name="descriptionReport" class="col-xs-12" rows="5"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 text-center">
                    <button class="btn btn-raised btn-primary" type="submit" id="send">Crear reporte</button>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 text-center">
                    <button class="btn btn-raised btn-primary" type="button" @click='myData.newreport = false'>Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</generalmodal>
