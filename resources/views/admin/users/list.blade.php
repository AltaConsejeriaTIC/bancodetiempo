@extends('layouts.appAdmin')
@section('script')
    
@endsection
@section('content') 
    <div class="py-1 px-3">
        @include('admin.partial.errors')
        
        <div class="content-area py-1">
					<div class="container-fluid">
						<h4>Reportes de usuarios</h4>
						<div class="box box-block bg-white">
							<h5 class="mb-1">Usuarios</h5>
				            <table class="table table-striped table-bordered dataTable" id="table-3" role="grid" aria-describedby="table-3_info">
									<thead>
										<tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="table-3" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" style="width: 206.25px;" aria-sort="ascending">Nombres</th>
                                            <th class="sorting" tabindex="0" aria-controls="table-3" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 264.25px;">Apellidos</th>
                                            <th class="sorting" tabindex="0" aria-controls="table-3" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 237.25px;">Email</th>
                                            <th class="sorting" tabindex="0" aria-controls="table-3" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 175.25px;">Rol</th>
                                            <th class="sorting" tabindex="0" aria-controls="table-3" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 127.25px;">Fecha creación</th>
										</tr>
										<tr>
										    <th rowspan="1" colspan="1"><input type="text" class="form-control" placeholder="Search Rendering engine"></th>
										    <th rowspan="1" colspan="1"><input type="text" class="form-control" placeholder="Search Browser"></th>
										    <th rowspan="1" colspan="1"><input type="text" class="form-control" placeholder="Search Platform(s)"></th>
										    <th rowspan="1" colspan="1"><input type="text" class="form-control" placeholder="Search Engine version"></th>
										    <th rowspan="1" colspan="1"><input type="text" class="form-control" placeholder="Search CSS grade"></th>
								        </tr>
									</thead>
									<tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{ $user->last_name }}</td>
                                            <td>{{ $user->email2 }}</td>
                                            <td>{{ $user->state->state }}</td>
                                            <td>{{ $user->role->role }}</td>  
                                            <td>{{ $user->created_at }}</td>               
                                        </tr>
                                        @endforeach
								    </tbody>
								</table>
					    </div>
				    </div>
        </div>
        
        
        <!--
        ///////
        
        
	    <h4>Reporte de usuarios</h4>
	    <div class="container-fluid py-1"> 
	    <div class="row bg-white py-2">
            <div class="col-12">
	        <h5>Usuarios</h5>
	        <table class="jsgrid-table table table-striped table-hover">
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
	    </div>    
		<div class="row">   
			<div class="col-md-12">	
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Lista de Usuarios Registrados en el Sistema</h2></div>
					<div class="panel-body">


						<div class="col-md-2 form-group navbar-right">
						  <span class="label label-success news">Hay {!! $users->total() !!} Usuarios Registrados</span>         
						</div>

						<div class="col-md-12">
													
						</div>						
						@include('admin/users/new')
						<div class="col-md-12 pagination pg-bluegrey">             
							{!! $users->render() !!}         
						</div>
					</div>
				</div>
			</div>
		</div>-->
	</div> 
</div>



@endsection
