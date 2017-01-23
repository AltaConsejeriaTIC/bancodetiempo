<template>
	<transition name="modal" >
    <div class="modal-mask" >
      <div class="modal-wrapper">
        <div class="modal-container">

            <div>
              <button type="button" @click="$emit('close')" class="close" data-dismiss="alert">&times;</button>
            </div>

            <div class="row modal-header">
                <h1 class="title1 text-center">¿Qué deseas ofrecer?</h1>
            </div>

            <div class="modal-body">                
            	<slot></slot>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
    </div>
  </transition>
</template>