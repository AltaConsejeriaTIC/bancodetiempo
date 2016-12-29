<div class='service-box'>
 
	<span class='category'>Categoria</span>
 
	<div class="cover">
 
		<img src="{{$service->image}}" alt="" />
 
	</div>
 
	<div class='avatar'>
		<svg class=""  viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
			<defs>
				<pattern id="img{{ $service->user->id }}" patternUnits="userSpaceOnUse" width="100" height="100">
					<image  xlink:href="{{ $service->user->avatar }}" x="-25" width="150" height="100" />
				</pattern>
			</defs>
			<polygon id="hex" stroke='#fff !important' points="50 1 95 25 95 75 50 99 5 75 5 25" fill="url(#img{{ $service->user->id }})"/>
		</svg>
	</div>
	<div class="content">
 
		<h3 class='title titulo2'>{{$service->name}}</h3>
 
		<p class='parrafo2'>{{str_limit($service->description, 100)}}</p>
 
		<div class='ranking'>
						
			@for($cont = 1 ; $cont <= 5 ; $cont++)
				
				@if($cont <= $service->user->ranking)
					<span class='material-icons parrafo1'>grade</span>
				@else
					<span class='material-icons parrafo6 star'>fiber_manual_record</span>
				@endif
			
			@endfor			

		</div>
		
		<div class='tags'>
		
			<span class='boton7'>numero 1</span>
			
			<span class='boton7'>numero 2</span>
			
			<span class='boton7'>numero 3</span>
		
		</div>
	 
	</div>

</div>