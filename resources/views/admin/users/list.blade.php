@extends('layouts.appAdmin')
@section('estilos')
    <link rel="stylesheet" href="/css/lib/daterangepicker.css">
    <link rel="stylesheet" href="/css/lib/bootstrap-datepicker.min.css">
@endsection
@section('script')
    <script src="/js/admin/user.js"></script>
    <script src="/js/lib/bootstrap-datepicker.min.js"></script>
    <script src="/js/lib/moment.js"></script>
    <script src="/js/lib/daterangepicker.js"></script>
    <script>
        var token = "{{ csrf_token() }}";
        jQuery(document).ready(function(){
            jQuery('#rango-fecha').daterangepicker({
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-success',
                cancelClass: 'btn-inverse',
            }, function(start, end, label) {
                rangoFecha(start.format('YYYY-MM-DD') + '|' + end.format('YYYY-MM-DD') );
                busqueda();
            });
            jQuery("#table-users tbody tr").on("click", modalDetailUsers)
        })
    </script>
@endsection
@section('content') 
    <div class="py-1 px-3">
        @include('admin.partial.errors')
        
        <div class="content-area py-1">
					<div class="container-fluid">
						<h4>Reportes de usuarios</h4>
						<div class="box box-block bg-white">
							<h5 class="mb-1">Usuarios</h5>
                        
                            <div class="row">
                                <div class="col-3 form-group">
                                    Tipo usuario: 
                                    <select name="tipo" id="tipo" class="form-control control">
                                        <option value="">Todos</option>
                                        <option value="1" @if(Request::get('tipo') == 1) selected @endif>Personas</option>
                                        <option value="2" @if(Request::get('tipo') == 2) selected @endif>Grupos</option>
                                    </select>
                                    <br>
                                    Plataforma:
                                    <select name="plataforma" id="pataforma" class="form-control control">
                                        <option value="">Todos</option>
                                        <option value="1" @if(Request::get('plataforma') == 1) selected @endif>Cambalachea</option>
                                        <option value="2" @if(Request::get('plataforma') == 2) selected @endif>Colegios Cambalachea</option>
                                    </select>

                                </div>
                                <div class="col-7 text-right">
                                    <button type="button" class="fa fa-download btn btn-info"  data-toggle="modal" data-target="#downloadModal"></button>
                                </div>
                                <div class="col-2">
                                    <p class="btn btn-outline-success">
                                        Total: {!! $users->total() !!}
                                    </p>
                                </div>
                            </div>
                        
				            <table class="table table-striped table-bordered dataTable" id="table-users" role="grid" aria-describedby="table-3_info">
									<thead>
										<tr role="row">
                                            <th >Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Email</th>
                                            <th>Estado</th>
                                            <th>Servicios ofertados</th>
                                            <th>Servicios adquiridos</th>
                                            <th>Fecha creación</th>
										</tr>
										<tr>
										    <th rowspan="1" colspan="1">
										        <input type="text" class="form-control control" placeholder="Nombres" name='name' value="{{Request::get('name')}}">
								            </th>
										    <th rowspan="1" colspan="1">
										        <input type="text" class="form-control control" placeholder="Apellidos" name="lastName" value="{{Request::get('lastName')}}">
				                            </th>
										    <th rowspan="1" colspan="1">
										        <input type="text" class="form-control control" placeholder="Email" name='email' value="{{Request::get('email')}}">
										    </th>
										    <th rowspan="1" colspan="1">
										        <select name="state" id="state" class="form-control control">
										            <option value=""></option>
										            <option value="1" @if(Request::get('state') == 1) selected @endif>Activo</option>
										            <option value="2" @if(Request::get('state') == 2) selected @endif>Inactivo</option>
										            <option value="3" @if(Request::get('state') == 3) selected @endif>Bloqueado</option>
										            <option value="4" @if(Request::get('state') == 4) selected @endif>Pendiente</option>
										        </select>
										    </th>
										    <th rowspan="1" colspan="1">
                                                <input type="text" class="form-control control" placeholder="" name="ofertados" value="{{Request::get('ofertados')}}">
                                            </th>
										    <th rowspan="1" colspan="1">
                                                <input type="text" class="form-control control" placeholder="" name="adquiridos" value="{{Request::get('adquiridos')}}">
                                            </th>
										    <th rowspan="1" colspan="1">
                                                <input class="form-control" type="text" name="fecha" id="rango-fecha" value="{{App\Helpers::rangoFecha(Request::get('fecha'))}}">
                                            </th>
								        </tr>
									</thead>
									<tbody>
                                        @foreach($users as $user)
                                        <tr data-user='{{$user->id}}'>
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{ $user->last_name }}</td>
                                            <td>{{ $user->email2 }}</td>
                                            <td>{{ $user->state->state }}</td> 
                                            <td>{{ $user->services->count() }}</td>   
                                            <td>{{App\Helpers::countDealsFinished($user)}}</td>       
                                            <td>{{ $user->created_at }}</td>               
                                        </tr>
                                        @endforeach
								    </tbody>
								</table>
					    </div>
					     <input type="hidden" class="" name="page" value="{{Request::get('page')}}">
					     <input type="hidden" class="control" name="fecha" id="rangoFecha" value="{{Request::get('fecha')}}">
					     <input type="hidden" class="control" name="download" id="download" value="">
					     <input type="hidden" class="control" name="tipoReporte" id="tipoReporte" value="">
					    <div class="col-12 pagination pg-bluegrey">             
							{!! $users->appends(["tipo" => Request::get('tipo'), "name" => Request::get('name'),"lastName" => Request::get('lastName'), "email" => Request::get('email'), "state" => Request::get('state')])->render('vendor.pagination.bootstrap-4') !!}         
						</div>
					    
				    </div>
        </div>
        
      
	</div> 

<div class="modal fade detailBox" tabindex="-1" role="dialog" aria-labelledby="detalle" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-4">
        <div class="row">
            <div class="col-2">
                <img src="/images/no-image.png" alt="avatar" id="d-avatar">
            </div>
            <div class="col-10">
                <div class="row">
                    <div class="col-6">
                        <h4 id="d-name"></h4>
                       <p class="">
                          <strong>Genero: </strong><i id="sex" class="fa fa-male px-4"></i>
                       </p>
                           
                    </div>
                   <div class="col-2">
                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update-dialog">
                          <i class="fa fa-edit"></i>
                        </button>
                   </div>
                   <div class="col-2"></div>
                   <div class="col-2">
                           <div class="progress" id="d-animacion">
                                <span class="progress-left">
                                    <span class="progress-bar"></span>
                                </span>
                                <span class="progress-right">
                                    <span class="progress-bar"></span>
                                </span>
                                <div class="progress-value" id="d-ranking"></div>
                            </div>
                   </div>
                   
                </div>
                <div class="row">
                    <div class="col-6">
                       <strong>Dorados: </strong> <span id="d-dorados"></span>
                   </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <strong>Tipo usuario: </strong> <span id="d-tipo"></span>
                    </div>
                    <div class="col-6">
                        <strong>Fecha nacieniento: </strong> <span id="d-birthDate"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <strong>Email: </strong> <span id="d-email"></span>
                    </div>
                    <div class="col-6">
                        <p><strong>Estado: </strong> <span id="d-estado"></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <strong>Description:</strong>
                        <p id="d-about"></p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
               <h6>Servicios ofertados</h6>
                <table class="table table-striped table-bordered dataTable" id="table-servicios1" role="grid" aria-describedby="table-3_info">
                            <thead>
                                <tr role="row">
                                    <th>Nombre</th>
                                    <th>Valor</th>
                                    <th>Modalidad</th>
                                    <th>Categoria</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>                                        

                            </tbody>
                        </table>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
               <h6>Servicios adquiridos</h6>
                <table class="table table-striped table-bordered dataTable" id="table-servicios2" role="grid" aria-describedby="table-3_info">
                    <thead>
                        <tr role="row">
                            <th>Nombre</th>
                            <th>Valor</th>
                            <th>Modalidad</th>
                            <th>Categoria</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>                                        

                    </tbody>
                </table>

            </div>
        </div>
    </div>
  </div>
</div>

@include('admin/users/update')

<div class="modal fade" id="downloadModal" tabindex="-1" role="dialog" aria-labelledby="download" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Descargar reporte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <input type="radio" name="downloadType" value="0" checked> Listado de usuarios<br>
            <input type="radio" name="downloadType" value="1"> Listado de usuarios con servicios ofertados<br>
            <input type="radio" name="downloadType" value="2"> Listado de usuarios con servicios adquiridos<br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="download();busqueda();">Descargar</button>
      </div>
    </div>
  </div>
</div>

@endsection
