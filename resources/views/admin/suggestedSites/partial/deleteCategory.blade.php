<generalmodal name='deletecategory' :state='myData.deletecategory' state-init='false'>
    <div slot="modal" class='panel'>
        <form action="/admin/suggestedSites/deleteCategory" method="post" id="filters" onkeypress="return event.keyCode != 13;">
            {{csrf_field()}}
            <div class="row">
                <div class="col-xs-12" v-if='myData.categorySites == 0'>
                    <p>Esta seguro?</p>
                </div>
                <div class="col-xs-12" v-else>
                    <p>Esta categoria no se puede eliminar por que tiene @{{myData.categorySites}} actualmente</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6" v-if='myData.categorySites == 0'>
                    <input type="hidden" name="categoryId" :value='myData.categoryId'>
                    <button type="submit" class="btn btn-raised btn-primary col-xs-12">Si</button>
                </div>
                <div class="col-xs-6">
                    <button type="button" class="btn btn-raised btn-primary col-xs-12" @click='myData.deletecategory = false'>No</button>
                </div>
            </div>

        </form>
    </div>
        </generalmodal>
