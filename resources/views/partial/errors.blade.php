  @if (Session::has('error'))
    <div class="overlay-container">
      <div class="window-container zoomin panel panel-default">        
        <div class="panel-heading">Error</div>
        <div class="panel-body">
          <span class="message-modal"> {{ Session::get('error') }}  </span> 
        </div>
        <span class="btn btn-raised btn-danger close">Cerrar</span>        
      </div>
    </div>
  @endif
  @if(Session::has('success'))
      <div class="alert alert-info alert-dismissable">{{ Session::get('success') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>
  @endif
  @if($errors->any())
      <div class="alert alert-danger alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p> Corrija Los Siguientes Errores:</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
      </div>
  @endif 