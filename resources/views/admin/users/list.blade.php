@extends('layouts.appAdmin')

@section('content') 
	<div class="container">     
		<div class="row">   
			<div class="col-md-12">	
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Lista de Usuarios Registrados en el Sistema</h2></div>
					<div class="panel-body">
						@include('admin.partial.errors')


						<div class="col-md-2 form-group navbar-right">
						  <span class="label label-success news">Hay {!! $users->total() !!} Usuarios Registrados</span>         
						</div>

						<div class="col-md-12">
							<table class="table table-striped table-hover">
							  <thead>
							  	<tr>
							  	  <th>Nombres</th>
							  	  <th>Apellidos</th>
							  	  <th>Email</th>
							  	  <th>Estado</th>
							  	  <th>Rol</th>		
							  	  <th>Fecha/Hora Creación</th>
							  	  <th>Acción</th>
							  	</tr>
						    </thead>
						    <tbody>
                              <tr>
                                {!! Form::open(['url' => 'homeAdminUser', 'method' => 'post', 'novalidate', 'id' => 'filter']) !!}
							        <td><input type="text" name="filterName" style='width:100px' value='{{request("filterName")}}'></td>
							        <td><input type="text" name="filterLastName" style='width:100px' value='{{request("filterLastName")}}'></td>
							        <td><input type="text" name="filterEmail" style='width:150px' value='{{request("filterEmail")}}'></td>
                                    <td>
                                       <select style='width:100px' name="filterState" onChange='jQuery("#filter").submit()'>
                                            <option value=""></option>
                                            @foreach($states as $key => $state)
                                                <option value="{{$key}}" @if(request("filterState") == $key) selected @endif >{{$state}}</option>
                                            @endforeach
                                        </select>
                                    </td>
							        <td></td>
							        <td class="row">
                                       <div class="col-md-9">
                                            <span>Fecha inicio</span>
                                            <input type="text" class="col-md-12 not-margin not-padding datepick" name="filtrerDateCreateStart" value="{{request('filtrerDateCreateStart')}}">
                                            <span>Fecha fin</span>
                                            <input type="text" class="col-md-12 not-margin not-padding datepick" name="filtrerDateCreateFinish" value="{{request('filtrerDateCreateFinish')}}">
                                       </div>

							            <i class="material-icons col-md-1" onclick="jQuery('#orderCreate').val(@if(request('orderDateCreate') == 'desc') 'asc' @else 'desc' @endif); jQuery('#filter').submit()">swap_vert</i>
							            <input type="hidden" name='orderDateCreate' id='orderCreate' value="{{request('orderDateCreate')}}">
							        </td>
                                  <td>
                                      <button type="submit" class="btn btn-raised btn-primary btn-xs"><i class="material-icons">search</i></button>
                                      <input type="hidden" name="download" value='0' id='download'>
                                      <button type="submit" class="btn btn-raised btn-primary btn-xs" onclick='jQuery("#download").val(1);'>
                                            <i class="material-icons">cloud_download</i>
                                        </button>
                                  </td>
						        {!! Form::close() !!}
                              </tr>

						      @foreach($users as $user)
						        <tr>
						        	<td>{{ $user->first_name }}</td>
						        	<td>{{ $user->last_name }}</td>
						        	<td>{{ $user->email2 }}</td>
						        	<td>{{ $user->state->state }}</td>
						        	<td>{{ $user->role->role }}</td>
						        	<td>{{ $user->created_at }}</td>
						        	<td>
						        		<a class="btn btn-raised btn-primary btn-xs" href="" title="Editar Usuario" data-toggle="modal" data-target="#update-dialog{{$user->id}}"><i class="material-icons">mode_edit</i></a>
						        		<a class="btn btn-raised btn-primary btn-xs" href="" title="Más Detalles" data-toggle="modal" data-target="#show-dialog{{$user->id}}"><i class="material-icons">find_in_page</i></a>						        		
						        	</td>                 
						        </tr>
										@include('admin/users/update')
										@include('admin/users/show')
						      @endforeach
						    </tbody>         
						  </table>						
						</div>						
						@include('admin/users/new')
						<div class="col-md-12 pagination pg-bluegrey">             
							{!! $users->render() !!}         
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 



@endsection
