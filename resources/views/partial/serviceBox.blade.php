@if(isset($service))
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

			</div>
			
			<div class='tags'>
			
				<a class='button7'>#tag 1</a>
				
				<a class='button7'>#tag 2</a>
				
				<a class='button7'>#tag 3</a>
			
			</div>
		 
		</div>

	</div>
@endif
