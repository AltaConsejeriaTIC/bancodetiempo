<popup name='blockedUser' :state='myData.blockedUser' state-init='true'>
    <div slot="body">
        <div class="modal-container">
            <div class="modal-header">
                <button type="button" class="close circle-shape" @click='myData.blockedUser = false'><span
                            aria-hidden="true">&times;</span></button>
            </div>
            <div class="text-center">
                <h1 class="title1">Usuario Bloqueado</h1>
                <p class="paragraph1" style="color: #001738;">
                    Tu cuenta ha sido bloqueada. Por favor, comunícate con nosotros a <a
                            href="mailto:info@cambalachea.co"
                            style="color:#445870; text-decoration: underline !important;">info@cambalachea.co</a>
                </p>
                <div class="">
                    <i class="material-icons" style="font-size: 132px">block</i>
                </div>
            </div>
        </div>
    </div>
</popup>
