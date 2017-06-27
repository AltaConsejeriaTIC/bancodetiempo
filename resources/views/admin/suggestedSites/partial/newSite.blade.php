<generalmodal name='newsite' :state='myData.newsite' state-init='true' close-time='true' time='500'>
    <div slot="modal" class='panel'>
        <form :action="myData.siteId == '' || myData.siteId === undefined ? '/admin/suggestedSites/newSite' : '/admin/suggestedSites/editSite' " method="post" id="filters" onkeypress="return event.keyCode != 13;">
            {{csrf_field()}}
            <div class="panel-heading">
                <button type="button" @click='myData.newsite = false;
                                               myData.siteName="";
                                               myData.siteAddress="";
                                               myData.siteRequirements="";
                                               myData.siteContact="";
                                               myData.siteDescription="";
                                               myData.siteCoordinates="";
                                               myData.siteId=""' class="close circle-shape"><span aria-hidden="true">×</span></button>
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="title2">Nuevo sitio</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <label for="name">Nombre:</label>
                </div>
                <div class="col-xs-8">
                    <input class='col-xs-12' type="text" id="name" name="name" v-model='myData.siteName'>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label for="name">Dirección:</label>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <input type="text" name='address' class="col-xs-12"  v-model='myData.siteAddress'>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label for="name">Requisitos:</label>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <textarea name="requirements" class='col-xs-12' rows="4" v-model='myData.siteRequirements'></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label for="name">Datos contacto:</label>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <textarea name="contact" class='col-xs-12' rows="4" v-model='myData.siteContact'></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label for="name">Descripción:</label>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <textarea name="description" class='col-xs-12' rows="4" v-model='myData.siteDescription'></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label for="name">Ubicación:</label>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <input type="hidden" name='coordinates' id='coordinates' v-model='myData.siteCoordinates'>
                    <input type="text" id='siteName' style="width:100%;">
                    <div id="map"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <input type="hidden" name="siteId" :value='myData.siteId'>
                    <input type="hidden" name="categoryId" :value='myData.categoryId'>
                    <button type="submit" class="btn btn-raised btn-primary col-xs-12">Generar</button>
                </div>
                <div class="col-xs-6">
                    <button type="button" class="btn btn-raised btn-primary col-xs-12" @click='myData.newsite = false;
                                               myData.siteName="";
                                               myData.siteAddress="";
                                               myData.siteRequirements="";
                                               myData.siteContact="";
                                               myData.siteDescription="";
                                               myData.siteCoordinates="";
                                               myData.siteId=""'>Cerrar</button>
                </div>
            </div>

        </form>
    </div>
</generalmodal>
