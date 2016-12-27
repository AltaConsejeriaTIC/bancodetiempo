  @if (Session::has('errorLogin'))  
    <div class="overlay-container">
      <div class="window-container zoomin panel panel-default">        
        <div class="panel-heading">Error</div>
        <div class="panel-body">
          <span class="message-modal"> {{ Session::get('errorLogin') }}  </span> 
        </div>
        <span class="btn btn-raised btn-danger close">Cerrar</span>        
      </div>
    </div>
  @endif