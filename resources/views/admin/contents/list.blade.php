@extends('layouts.appAdmin')

@section('content')

<div class="py-1 px-3">

    @include('admin.partial.errors')

    <div class="content-area py-1">

        <div class="container-fluid">
            <h4>Lista de Contenidos administrables en el Sistem</h4>
            <div class="box box-block bg-white">
                <h5 class="mb-1">Hay {!! $contents->total() !!} Contenidos Registradas</h5>

                <div class="row">

                    <div class="col-md-12">
				        <table class="table table-striped table-hover">
				            <thead>
				                <tr>
							  	  <th>Categoría</th>							  	  
							  	  <th>Acción</th>
							  	</tr>
						    </thead>
						    <tbody>
							@foreach($contents as $cont)
								<tr>
									<td>{{ $cont->name }}</td>
									<td>
										<a class="btn btn-raised btn-primary btn-xs" href="" title="Editar Contenido" data-toggle="modal" data-target="#update-dialog{{$cont->id}}"><i class="fa fa-edit"></i> Editar</a>
									</td>
								</tr>
								@include('admin/contents/update')
							@endforeach
						    </tbody>         
				        </table>
				    </div>
				    <div class="col-md-12 pagination">
					    {!! $contents->render() !!}
				    </div>

                </div>

            </div>
        </div>
    </div>
</div>


@endsection
