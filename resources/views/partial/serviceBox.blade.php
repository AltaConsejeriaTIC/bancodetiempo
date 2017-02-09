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
			{!! Form::model($service, ['url' => ['serviceDelete', $service->id], 'method' => 'get', 'class' => 'form-custom col-xs-12 col-sm-12']) !!}		
				@include('services.partial.deleteService')
			{!!Form::close()!!}		
		@endif			
			<span class='category'>{{$service->category->category}}</span>
			<a href="@if( Auth::user()) service/{{$service->id}} @else serviceGuest/{{$service->id}}@endif">
			<div class="cover">
				<img src="{{$service->image}}" alt="" />
			</div>
			</a>
		<div class='avatar'>
			@include('partial/imageProfile', array('cover' => $service->user->avatar, 'id' => $service->user->id, 'border' => '#fff', 'borderSize' => '2px'))
		</div>
			<a href="@if( Auth::user()) service/{{$service->id}} @else serviceGuest/{{$service->id}}@endif">
			<div class="content">
				<h3 class='title title2'>{{$service->name}}</h3>		 		
		 		<div class='ranking'>											
					<div>
						@for($cont = 1 ; $cont <= 5 ; $cont++)
							@if($cont <= $service->user->ranking)
								<span class='material-icons paragraph9'>grade</span>
							@else
								<span class='material-icons paragraph8 '>fiber_manual_record</span>
							@endif
						@endfor
					</div>		
				</div>
				<div class="space15">										
				</div>				
				<p class='paragraph2'>{{str_limit($service->description, 100)}}</p>
				<div class='col-xs-12  col-sm-12'>										
					@foreach($tags as $tag)
						@if($tag->service_id == $service->id)
							<a class="col-xs-6 input-tag button7 tag-margin" tag='{{ $tag->id }}' href='/filter?filter=%23{{ $tag->tag }}'>
					      		<span>{{ $tag->tag }}</span>								      
					   		</a>
					  @endif
				  @endforeach
				</div>
			</div>
		</a>
	</div>
@endif
