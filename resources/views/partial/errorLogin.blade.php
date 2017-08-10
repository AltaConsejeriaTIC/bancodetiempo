<popup name='errorLogin' :state='myData.errorLogin' state-init='true'>
    <div slot="body" v-cloak>
        <div class="modal-container">
            <div class="modal-header">
                <button type="button" class="close circle-shape" @click='myData.errorLogin = false'><span
                            aria-hidden="true">&times;</span></button>
            </div>
            <div class="text-center">
                <h1 class="title1">Este email ya se encuentra registrado</h1>
                <p class="paragraph1 secondary-color">
                    {{session('errorLogin')}}
                </p>
                <div>
                    <i class="material-icons" style="font-size: 132px">block</i>
                </div>
            </div>
        </div>
    </div>
</popup>
