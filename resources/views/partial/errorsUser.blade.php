  @if (Session::has('errorLogin'))  
   <div class="container ">
   <div class="alert alert-danger alert-dismissable">{{ Session::get('errorLogin') }}
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    </div>
  @endif