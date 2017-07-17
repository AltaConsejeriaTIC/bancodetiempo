<popup name='blockedUser' :state='myData.blockedUser' state-init='true'>
    <div slot="body">
        <div class="modal-container">
            <div class="modal-header">
                <button type="button" class="close circle-shape" @click='myData.blockedUser = false'><span
                            aria-hidden="true">&times;</span></button>
            </div>
            <div class="text-center">
                <h1 class="title1">Usuario Bloqueado</h1>
                <p class="paragraph1 secondary-color">Tu cuenta ha sido bloqueada.<br/>Por favor, comunícate con nosotros a <a
                            href="mailto:info@cambalachea.co"
                            class="link">info@cambalachea.co</a>
                </p>
                <div>
                    <i class="material-icons" style="font-size: 132px">block</i>
                </div>
            </div>
        </div>
    </div>
</popup>
