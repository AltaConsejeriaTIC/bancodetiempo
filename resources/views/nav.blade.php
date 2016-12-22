@if($type == 1)
		
	<nav class='navbar navbar-default navbar-static-top nav1'>
		
		<div class="container">
	
			<div class='row'>
			
				<a class="col-md-3 col-sm-4 col-xs-8" id="logo-container" href="/" class="brand-logo"><i class="material-icons">fiber_manual_record</i>{{ config('app.name', 'Tiempo X Tiempo') }}</a>
	            <a class="loginBt col-md-3 col-md-offset-6  col-sm-3 col-sm-offset-5 col-xs-3 col-xs-offset-1" href="{{ url('login') }}">{{ trans('dictionary.login') }}</a>
			
			</div>
	
		</div>
	    
	 </nav>
	 
@elseif($type == 2)

	<nav>
		
		
	    
	 </nav>
    
@endif
