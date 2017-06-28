@extends('layouts.appAdmin')

@section('content')
<div class="container" id="app">
    <div class="panel panel-default">
        <div class="row panel-heading">
            <h2 class="title3"> <a href="/homeAdmin">Volver</a></h2>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <button type="button" class="btn btn-raised btn-primary" @click='myData.newreport = true'>Crear reporte</button>
            </div>
        </div>

        <div class="row">

            <div class="col-xs-12">
                <h1 class="title2">Mis reportes</h1>
            </div>

        </div>

        <div>
            @foreach($reports as $report)

                <div class="row button1 lead">
                   <div class="col-xs-3">
                       <a href="/admin/report/{{$report->id}}"> {{$report->name}} </a>
                   </div>

                    <div class="col-xs-6">
                        <p>
                            <a href="/admin/report/{{$report->id}}"> {{$report->description}} </a>
                        </p>
                    </div>
                    <div class="col-xs-3 text-center">

                        <form action="/admin/reports/delete" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{$report->id}}" name="report_id">
                            <a  class="btn btn-raised btn-primary not-margin" href="/admin/report/{{$report->id}}"><i class="material-icons">find_in_page</i></a>
                            <button type="submit" class="btn btn-raised btn-primary not-margin"><i class="material-icons">delete</i></button>
                        </form>
                    </div>

                </div>

            @endforeach
        </div>

    </div>
@include("admin/reports/partial/newReport")
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
@endsection
