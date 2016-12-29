@extends('layouts.app')
<link href="{{ asset('/css/styleUser.css') }}" rel="stylesheet">
@section('content')
@include('nav',array('type' => 2))

<div class="panel">
      <div class="container">
          <ul  class="nav nav-pills">
			<li class="active">
        		<a  href="#1a" data-toggle="tab">Todos</a>
			</li>
		</ul>

		<div class="tab-content clearfix">
			<div class="tab-pane active" id="1a">
				<div class='row'>
		          @foreach($allServices as $service)
		          
		          	<div class='col-md-4'>
			          	<div class='service-box'>
		          			
		          			<span class='category'>Categoria</span>
		          			
		          			<div class="cover">
		          			
		          				<img src="{{$service->image}}" alt="" />
		          			
		          			</div>
		          			
		          			<div class='avatar'>
		          				<svg class=""  viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
										<defs>
											<pattern id="img" patternUnits="userSpaceOnUse" width="100" height="100">
												<image  xlink:href="{{ $service->user->avatar }}" x="-25" width="150" height="100" />
											</pattern>
										</defs>
									<polygon id="hex" stroke='#fff !important' points="50 1 95 25 95 75 50 99 5 75 5 25" fill="url(#img)"/>
								</svg>
		          			</div>
		          			
		          			<h3 class='title titulo2'>{{$service->name}}</h3>
		          			
		          			<p></p>
		          			
		          		</div>		          	
		          	</div>
		          
		          @endforeach
		        </div>
			</div>
  		</div>
    </div>
</div>

@endsection
