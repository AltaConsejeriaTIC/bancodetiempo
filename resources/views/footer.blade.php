<footer>

	<div class="container">
		
		<div class="row">



		</div>
	
	</div>

</footer>

@foreach(Illuminate\Support\Facades\Session::get("filters.tags") as $tag)
	<style>
		a[tag='{{$tag->id}}']{
			background-color:#0f6783;
			border-color:#0f6783;
			color:#fff !important;
		}
	</style>
@endforeach