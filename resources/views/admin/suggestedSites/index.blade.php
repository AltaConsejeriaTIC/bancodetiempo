@extends('layouts.appAdmin')

@section('content')
    <div class="container" id="app">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">

                    <div class="panel-heading">
                        <h2 class="title1">Sitios sugeridos</h2>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="button" class="btn btn-raised btn-primary" @click='myData.newcategory = true'>Nueva categoria <i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>Icono</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>

                        @foreach($categories as $category)

                            <tr @click='myData.editcategory = true'>
                                <td><i class="fa fa-{{$category->icon}} text-center" style="font-size:25px"></i></td>
                                <td>{{$category->name}}</td>
                                <td></td>
                            </tr>

                        @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>

       @include('admin.suggestedSites.partial.newCategory')

        <generalmodal name='editcategory' :state='myData.editcategory' state-init='false'>
            <div slot="modal" class='panel'>
                <form action="/admin/suggestedSites/editCategory" method="post" id="filters">
                    {{csrf_field()}}
                    <div class="panel-heading">
                        <button type="button" @click='myData.editcategory = false' class="close circle-shape"><span aria-hidden="true">×</span></button>
                        <div class="row">
                            <div class="col-xs-12">
                                <h2 class="title2">Editar Categoria</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <label for="name">Nombre:</label>
                        </div>
                        <div class="col-xs-7">
                            <input class='col-xs-12' type="text" id="name" name="name" value="@{{}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label for="name">Icono:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <select-icon icon=''></select-icon>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <button type="submit" class="btn btn-raised btn-primary col-xs-12" @click='myData.editcategory = false'>Generar</button>
                        </div>
                        <div class="col-xs-6">
                            <button type="button" class="btn btn-raised btn-primary col-xs-12" @click='myData.editcategory = false'>Cerrar</button>
                        </div>
                    </div>

                </form>
            </div>
        </generalmodal>

    </div>



<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

@endsection
