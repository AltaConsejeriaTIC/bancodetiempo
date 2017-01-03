
@verbatim
	<!-- template for the modal component -->
	<template id="modal-template">
	  <div class="modal-mask" v-show="show" transition="modal">
	      <div class="modal-container">

	          <div class="modal-header">
	              <h3>New Post</h3>
	          </div>

	          <div class="modal-body">
	              <label class="form-label">
	                  Title
	                  <input class="form-control">
	              </label>
	              <label class="form-label">
	                  Body
	                  <textarea rows="5" class="form-control"></textarea>
	              </label>
	          </div>

	          <div class="modal-footer text-right">
	              <button class="modal-default-button" @click="savePost()">
	                  Save
	              </button>
	          </div>
	      </div>
	  </div>
	</template>
@endverbatim

	<div id="app">
    <button id="show-modal" class="col-md-12 deleteProfile" @@click="showModal = true">Desactivar Cuenta</button>
    @{{name}}
    <!-- use the modal component, pass in the prop -->
    @verbatim
	    <modal :show.sync="showModal">

	    </modal>
    @endverbatim
	</div> 
