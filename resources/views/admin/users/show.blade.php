<div id="show-dialog{{$user->id}}" class="modal fade" tabindex="-1" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="panel-heading modal-title titleContent">Información Usuario {{$user->first_name}} {{$user->last_name}} </h4>
      </div>      
			<div class="modal-body">									
				<div class="row">                      
          <div class="panel panel-primary modalPanel">
            <div class="panel-body"> 
              @if($user->avatar)
                <span>
                  <img class="profileImg" src="{{ $user->avatar }}">
                </span>
              @else
                <span>
                <img class="profileImg" src="/images/user-profile.jpg">
              </span>
              @endif             
              
              <h3 class="subTitle">{{$user->first_name." ".$user->last_name}}</h3>
              <div class="col-md-12">
                <label>E-mail</label>
                <p>{{$user->email}}</p>
              </div>
              <div class="col-md-6">
                <label>Estado</label>
                <p>{{ $user->state_id == 1 ? 'Activo' : 'Inactivo' }}</p>
              </div>
              <div class="col-md-6">
                <label>Genero</label>
                <p>{{$user->gender ?  : 'Sin Información'}}</p>
              </div>
              <div class="col-md-6">
                <label>Fecha de Nacimiento</label>
                <p>{{ $user->birthDate ?  : '0000-00-00' }}</p>
              </div>
              <div class="col-md-6">
                <label>Role</label>
                <p>{{ $user->role_id }}</p>
              </div>
              <div class="col-md-12">
                <label>Dirección</label>
                <p>{{$user->address ?  : 'Sin Información'}}</p>
              </div>
              <div class="col-md-12">
                <label>Acerca de mi</label>
                <p>{{$user->aboutMe ?  : 'Sin Información'}}</p>
              </div>              
            </div>
          </div>
        </div>
      </div>
		</div>			
  </div>
</div>
