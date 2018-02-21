@extends('layouts.appAdmin')

@section('content') 
<div class="py-1 px-3">

    @include('admin.partial.errors')

    <div class="content-area py-1">

        <div class="container-fluid">
            <h4>Lista de Categorias</h4>
            <div class="box box-block bg-white">
                <h5 class="mb-1">Categorias</h5>

                <div class="row">
                    <div class="col-3 form-group">

                    </div>
                    <div class="col-7 text-right">

                    </div>
                    <div class="col-2">
                        <p class="btn btn-outline-success">
                            Total: {!! $categories->total() !!}
                        </p>
                    </div>
                </div>

                <table class="table table-striped table-bordered dataTable" id="table-users" role="grid" aria-describedby="table-3_info">
                    <thead>
                        <tr role="row">
                            <th>Nombre</th>
                        <tr>
                            <th rowspan="1" colspan="1">
                                <input type="text" class="form-control control" placeholder="Nombre" name="name" value="{{Request::get('name')}}">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td class="edit-field position-relative" data-field='category' data-id='{{$category->id}}'>{{ $category->category }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
             <input type="hidden" class="" name="page" value="{{Request::get('page')}}">
             <input type="hidden" class="control" name="fecha" id="rangoFecha" value="{{Request::get('fecha')}}">
             <input type="hidden" class="control" name="download" id="download" value="">
            <div class="col-12 pagination pg-bluegrey">
                {!! $categories->appends(["name" => Request::get('name')])->render('vendor.pagination.bootstrap-4') !!}
            </div>

        </div>
    </div>


</div>
@endsection

@section('script')
<script src="/js/admin/inputEdit.js"></script>
<script>
    jQuery(".edit-field").inputEdit({
        url : "/admin/category/changeField",
        class : "edit",
        token : "{{csrf_token()}}"
    })
</script>
@endsection
