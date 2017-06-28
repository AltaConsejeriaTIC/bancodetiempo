<generalmodal name='deletesite' :state='myData.deletesite' state-init='false'>
    <div slot="modal" class='panel'>
        <form action="/admin/suggestedSites/deleteSite" method="post" id="filters" onkeypress="return event.keyCode != 13;">
            {{csrf_field()}}
            <div class="row">
                <div class="col-xs-12">
                    <p>Esta seguro?</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <input type="hidden" name="siteId" :value='myData.siteId'>
                    <button type="submit" class="btn btn-raised btn-primary col-xs-12">Si</button>
                </div>
                <div class="col-xs-6">
                    <button type="button" class="btn btn-raised btn-primary col-xs-12" @click='myData.deletesite = false'>No</button>
                </div>
            </div>

        </form>
    </div>
</generalmodal>
