@if(isset($service))
	<div class='service-box'>	
		@if(isset($edit))		
			<div class="col-md-5 icons-button-content">				
				<button class="icons-button" data-toggle="modal" data-target="#EditService{{$service->id}}"><i class="fa fa-pencil"></i></button>					
				<button class="icons-button" data-toggle="modal" data-target="#DeleteService{{$service->id}}"><i class="fa fa-trash-o"></i></button>						
			</div>
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
	</div>
@endif
