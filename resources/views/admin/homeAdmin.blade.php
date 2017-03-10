@extends('layouts.appAdmin')

@section('content') 
	<div class="container">     
		<div class="row">   			
			<div class="col-md-12">	
				<div class="panel panel-default">  						
					<div class="panel-heading">
						<h2>Panel de Administración</h2>
					</div>
				</div>
  		</div>
  		<div class="col-md-12">
  			@include('partial.errors')
  		</div>
			<div class="col-md-6">	
				<div class="panel panel-default">
					<div class="panel-heading"><h3>Administrar Usuarios</h3></div>
					<div class="panel-body">
						<p>Sección para Gestionar los usuarios registrados en el sistema.(Administradores o Usuarios de la comunidad.)</p>
		  			<p><a href="/homeAdminUser" class="btn btn-raised btn-primary btn-lg">Ingresar</a></p>		
					</div>
				</div>
			</div>
			<div class="col-md-6">	
				<div class="panel panel-default">
					<div class="panel-heading"><h3>Administrar Categorias</h3></div>
					<div class="panel-body">
						<p>Sección para Gestionar categorias a las que pertenecen los servicios que ofrece el sistema.</p>
		  			<p><a href="/homeAdminCategory" class="btn btn-raised btn-primary btn-lg">Ingresar</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading"><h3>Administrar Contenidos</h3></div>
					<div class="panel-body">
						<p>Sección para Gestionar las paginas de contenidos cambiantes.</p>
						<p><a href="/homeAdminContents" class="btn btn-raised btn-primary btn-lg">Ingresar</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading"><h3>Administrar Ofertas</h3></div>
					<div class="panel-body">
						<p>Sección para Gestionar todas las ofertas.</p>
						<p><a href="/homeAdminServices" class="btn btn-raised btn-primary btn-lg">Ingresar</a></p>
					</div>
				</div>
			</div>
		</div>
	</div> 
@endsection