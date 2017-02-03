@if(isset($service))
<<<<<<< HEAD
	<div class='service-box'>
		

	@if(isset($edit))		
		<button class="icons-button" data-toggle="modal" data-target="#EditService"><i class="fa fa-pencil"></i></button>		
		{!! Form::open(['url' => '/service/save', 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'form', 'class' => 'form-custom col-xs-12 col-sm-12']) !!}
			<editservice></editservice>		
		{!!Form::close()!!}
	@endif
		<span class='category'>{{$service->category->category}}</span>
		<a href="service/{{$service->id}}">
		<div class="cover">

				<img src="{{$service->image}}" alt="" />

			</div>
		</a>
		<div class='avatar'>
			@include('partial/imageProfile', array('cover' => $service->user->avatar, 'id' => $service->user->id, 'border' => '#fff', 'borderSize' => '2px'))
		</div>
		<a href="service/{{$service->id}}">
		<div class="content">
			<h3 class='title title2'>{{$service->name}}</h3>
	 		<div class='ranking'>											
				<div>											
					@for($cont = 1 ; $cont <= 5 ; $cont++)												
						@if($cont <= $service->user->ranking)
							<span class='material-icons paragraph8'>grade</span>
						@else
							<span class='material-icons paragraph8 star'>fiber_manual_record</span>
						@endif												
					@endfor												
				</div>		
=======
	<div class='service-box'>	
		@if(isset($edit))		
			<button class="icons-button" data-toggle="modal" data-target="#EditService{{$service->id}}"><i class="fa fa-pencil"></i></button>		
			{!! Form::model($service, ['url' => ['service/save', $service->id], 'method' => 'put', 'enctype' => 'multipart/form-data', 'id' => 'form', 'class' => 'form-custom col-xs-12 col-sm-12']) !!}
				<editservice name="EditService{{$service->id}}" id="{{$service->id}}"></editservice>		
			{!!Form::close()!!}
		@endif
			<span class='category'>{{$service->category->category}}</span>		 
			<div class="cover">		 
				<img src="{{$service->image}}" alt="" />		 
			</div>		 
			<div class='avatar'>
				@include('partial/imageProfile', array('cover' => $service->user->avatar, 'id' => $service->user->id, 'border' => '#fff', 'borderSize' => '2px'))
>>>>>>> 721b9dca6efc20b7720e84130a5c87daa4019ddc
			</div>
			<div class="content">		 
				<h3 class='title title2'>{{$service->name}}</h3>		 		
		 		<div class='ranking'>											
					<div>											
						@for($cont = 1 ; $cont <= 5 ; $cont++)												
							@if($cont <= $service->user->ranking)
								<span class='material-icons paragraph8'>grade</span>
							@else
								<span class='material-icons paragraph8 star'>fiber_manual_record</span>
							@endif												
						@endfor												
					</div>		
				</div>
				<div class="space15">										
				</div>				
				<p class='paragraph2'>{{str_limit($service->description, 100)}}</p>
				<div class='tags'>										
					<a class='button7'>#Palabraclave</a>				
				</div>
			</div>
<<<<<<< HEAD
		 
		</div>
		</a>
=======
>>>>>>> 721b9dca6efc20b7720e84130a5c87daa4019ddc
	</div>
@endif
