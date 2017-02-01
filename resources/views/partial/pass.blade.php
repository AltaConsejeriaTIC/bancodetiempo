<div class='row margin-auto relative'>
	<div class="not-padding text-center col-xs-3 pass @if(isset($pass1) && $pass1 == 'actual') passActive @endif @if(isset($pass1) && $pass1 == 'done') passDone @endif" @if(isset($pass2) && ($pass2 == 'actual' || $pass2 == 'done')) onClick="window.location.href = '/register'" @endif>
		<span class='passNum'>1</span>
		<p></p>
		<p>Completa<br>tus&nbsp;datos</p>
	</div>
	<div class='not-padding text-center col-xs-2'>
		<span class='passSpace'></span>
	</div>
	<div class="not-padding text-center pass col-xs-3 @if(isset($pass2) && $pass2 == 'actual') passActive @endif @if(isset($pass2) && $pass2 == 'done') passDone @endif"  @if(isset($pass2) && ($pass2 == 'actual' || $pass2 == 'done')) onClick="window.location.href = '/interest'" @endif>
		<span class='passNum'>2</span>
		<p></p>
		<p>Elige tus<br>intereses</p>
	</div>
	<div class='not-padding text-center col-xs-1'>
		<span class='passSpace'></span>
	</div>
	<div class="not-padding text-center pass col-xs-3 @if(isset($pass3) && $pass3 == 'actual') passActive @endif @if(isset($pass3) && $pass3 == 'done') passDone @endif"  @if(isset($pass3) && ($pass3 == 'actual' || $pass3 == 'done')) onClick="window.location.href = '/service'" @endif>
		<span class='passNum'>3</span>
		<p></p>
		<p>Publica<br>una&nbsp;oferta</p>
	</div>
</div>