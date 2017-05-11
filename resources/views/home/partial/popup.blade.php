<generalmodal name='popup' :state='myData.popup' state-init='true' close-time='true'>
    <div slot="modal" class="panel row">
        <img src="/images/popup.jpg" alt="">
        <p class="col-xs-12 paragraph1">Alta Consejería TIC - Bogotá y #ViveLabBogotá te invitan a Cambalachear habilidades y conocimientos en torno en habilidades de internet para que mejores tu negocio, tu proyecto o amplíes tus conocimientos.</p>
        <button type="button" class="button1 background-active-color col-xs-8 col-xs-offset-2" @click='myData.popup = false'>Cerrar</button>
        <div class="space10"></div>
    </div>
</generalmodal>
