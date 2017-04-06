<div class='row margin-auto relative'>
	<div class="not-padding text-center col-xs-3 pass @if(Route::current()->getUri() == 'register') passActive @endif @if(Session::get('pass1') == 1) passDone @endif"  onClick="window.location.href = '/register'" >
		<span class='passNum'>1</span>
		<p></p>
		<p>Completa<br>tus&nbsp;datos</p>
	</div>
	<div class='not-padding text-center col-xs-2'>
		<span class='passSpace'></span>
	</div>
	<div class="not-padding text-center pass col-xs-3 @if(Route::current()->getUri() == 'interest') passActive @endif @if(Session::get('pass2') == 1) passDone @endif"  @if(Session::get('pass2') == 1 || Session::get('pass1') == 1) onClick="window.location.href = '/interest'" @endif>
		<span class='passNum'>2</span>
		<p></p>
		<p>Elige tus<br>intereses</p>
	</div>
	<div class='not-padding text-center col-xs-1'>
		<span class='passSpace'></span>
	</div>
	<div class="not-padding text-center pass col-xs-3  @if(Route::current()->getUri() == 'service') passActive @endif @if(Session::get('pass3') == 1) passDone @endif"  @if(Session::get('pass3') == 1 || Session::get('pass2') == 1) onClick="window.location.href = '/service'" @endif>
		<span class='passNum'>3</span>
		<p></p>
		<p>Publica<br>una&nbsp;oferta</p>
	</div>
</div>
