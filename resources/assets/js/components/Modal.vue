<template>
    <transition name="modal" >
        <div class="modal-mask" >
            <div class="modal-wrapper">
              <div class="modal-container">
                <div class="close-modal ">
                  <button type="button" @click="$emit('close')" class="close circle-shape" data-dismiss="alert">&times;</button>
                </div>
                <div class="modal-header-welcome">
                    <h1 class="title1">¡Ingresa!</h1>
                </div>
                <div class="modal-body-welcome">
                  <p class="paragraph2">
                    Elige la opción que desees para ingresar.
                  </p>
                  <div class="modal-button-center">
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
                </div>
                <div class="modal-footer">        
                </div>
              </div>
            </div>
        </div>
    </transition>
</template>