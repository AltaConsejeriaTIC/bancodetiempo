@if($service)
	<div class='service-box'>
	 
		<span class='category'>{{$service->category->category}}</span>
	 
		<div class="cover">
	 
			<img src="{{$service->image}}" alt="" />
	 
		</div>
	 
		<div class='avatar'>
			@include('partial/imageProfile', array('cover' => $service->user->avatar, 'id' => $service->user->id, 'border' => '#fff', 'borderSize' => '2px'))
		</div>
		<div class="content">
	 
			<h3 class='title title2'>{{$service->name}}</h3>
	 
			<p class='paragraph2'>{{str_limit($service->description, 100)}}</p>
	 
			<div class='ranking'>
				
				<div>
				
					@for($cont = 1 ; $cont <= 5 ; $cont++)
					
						@if($cont <= $service->user->ranking)
							<span class='material-icons paragraph1'>grade</span>
						@else
							<span class='material-icons paragraph6 star'>fiber_manual_record</span>
						@endif
					
					@endfor	
				
				</div>		

			</div>
			
			<div class='tags'>
			
				<a class='button7'>numero 1</a>
				
				<a class='button7'>numero 2</a>
				
				<a class='button7'>numero 3</a>
			
			</div>
		 
		</div>

	</div>
@endif
