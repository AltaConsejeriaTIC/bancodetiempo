<generalmodal name='editcategory' :state='myData.editcategory' state-init='false'>
    <div slot="modal" class='panel'>
        <form action="/admin/suggestedSites/editCategory" method="post" id="filters">
            {{csrf_field()}}
            <div class="panel-heading">
                <button type="button" @click='myData.editcategory = false' class="close circle-shape"><span aria-hidden="true">×</span></button>
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="title2">Editar Categoria</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <label for="name">Nombre:</label>
                </div>
                <div class="col-xs-7">
                    <input class='col-xs-12' type="text" id="name" name="name" :value="myData.nameCategory" v-model='myData.nameCategory'>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label for="name">Icono:</label>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <select-icon :icon='myData.iconCategory'></select-icon>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <input type="hidden" name="categoryId" :value='myData.categoryId'>
                    <button type="submit" class="btn btn-raised btn-primary col-xs-12" @click='myData.editcategory = false'>Editar</button>
                </div>
                <div class="col-xs-6">
                    <button type="button" class="btn btn-raised btn-primary col-xs-12" @click='myData.editcategory = false'>Cerrar</button>
                </div>
            </div>

        </form>
    </div>
</generalmodal>
