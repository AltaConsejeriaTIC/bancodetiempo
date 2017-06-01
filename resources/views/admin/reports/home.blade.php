@extends('layouts.appAdmin')

@section('content')
<div class="container" id="app">
    <div class="panel panel-default">
        <h2 class="title2"> <a href="/homeAdmin">Volver</a></h2>
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

        <div class="row">

            <div class="col-xs-12">
                <ul>
                    @foreach($reports as $report)

                        <li><a href="/admin/report/{{$report->id}}"> {{$report->name}} </a></li>

                    @endforeach
                </ul>
            </div>

        </div>

    </div>
@include("admin/reports/partial/newReport")
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
@endsection
