  @if (Session::has('error'))
    <div class="alert alert-danger alert-dismissable">{{ Session::get('error') }}
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
  @endif
  @if (Session::has('errorLogin'))
    <div class="alert alert-danger alert-dismissable">{{ Session::get('errorLogin') }}
      <button type="button" class="close" data-dismiss="alert">&times;</button>
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