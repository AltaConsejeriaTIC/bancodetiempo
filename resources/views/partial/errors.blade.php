  @if (Session::has('error'))
      <div class="alert alert-danger">{{ Session::get('error') }}</div>
  @endif
  @if (Session::has('success'))
      <div class="alert alert-info">{{ Session::get('success') }}</div>
  @endif
  @if($errors->any())
      <div class="alert alert-danger" role="alert">
        <p> Corrija Los Siguientes Errores:</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
      </div>
  @endif