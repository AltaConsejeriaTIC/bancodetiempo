<footer>

	<div class="container">
		
		<div class="row">
			
			<a class="button5" href="/terms">Términos y condiciones</a>			
			<a class="button5" href="/privacyPolicies">Políticas de privacidad</a>
		</div>
	
	</div>

</footer>

@foreach(Illuminate\Support\Facades\Session::get("filters.tags", []) as $tag)
	<style>
		a[tag='{{$tag->id}}']{
			background-color:#0f6783;
			border-color:#0f6783;
			color:#fff !important;
		}
	</style>
@endforeach