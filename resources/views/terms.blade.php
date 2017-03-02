@extends('layouts.app')
@section('content')
	<modal></modal>
	@include('nav',array('type' => 3))
@section('content')
	<div class="container ">
		<div class="row">
	<h1>Terminos y Condiciones</h1>
	<div>{{$content->description}}</div>
		</div>
	</div>
@endsection
