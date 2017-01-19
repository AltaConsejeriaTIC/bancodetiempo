<template>
    <transition name="modal" >
        <div class="modal-mask" >
            <div class="modal-wrapper">
              <div class="modal-container">
                <div>
                  <button type="button" @click="$emit('close')" class="close" data-dismiss="alert">&times;</button>
                </div>
                <div class="modal-header">
                    <h1 class="title1">Inicia sesión </h1>
                </div>
                <div class="modal-body">
                  <p class="paragraph2">
                    Mensaje de Registro {{show}}
                  </p>            
                  <div class="row">
                    <div class="col-xs-12">
                      <a href="loginRedes/facebook" class="col-xs-12 col-md-12 button6 social-button facebook">Ingresa con Facebook <i class="fa fa-facebook"></i></a>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <a href="loginRedes/google"  class="col-xs-12 col-md-12 button6 social-button google">Ingresa con Google <i class="fa fa-google"></i></a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <a href="loginRedes/linkedin"  class="col-xs-12 col-md-12 button6 social-button linkedin">Ingresa con Linkedin <i class="fa fa-linkedin"></i></a>
                    </div>
                  </div>          
                </div>
                <div class="modal-footer">        
                </div>
              </div>
            </div>
        </div>
    </transition>
</template>
<script >
    export default{

        mounted() {
            console.log('Component ready.')
         }
    }
</script>
