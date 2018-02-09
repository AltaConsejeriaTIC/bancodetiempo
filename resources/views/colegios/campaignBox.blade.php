@if(isset($campaign))
<div class='campaign-box row'>
	@if(isset($edit))
	<div class="col-5 icons-button-content">
		<button class="icons-button" @click="myData.editCampaign{{$campaign->id}}=true"><i
			class="fa fa-pencil"></i>
		</button>
		<button class="icons-button" @click="myData.deleteCampaign{{$campaign->id}}=true"><i
			class="fa fa-trash-o"></i>
		</button>
	</div>
	@include('campaigns/partial/editCampaign', array("$campaign" => $campaign))
	@include('campaigns/partial/deleteCampaign', array("$campaign" => $campaign))
	@endif
	<div class="col-4 cover px-0">
		@if($campaign->user->group == 1)
		<i class="iconGroups fa fa-users"  data-toggle="tooltip" title='Esta campaña pertenece a un grupo'></i>
		@endif
		<a href="/campaign/{{$campaign->id}}">
			<div class="cover" style="background-image : url('{{env('APP_URL')}}getImg?img={{$campaign->image}}&w=400')">
			</div>
		</a>
	</div>
	<div class="col-8 pt-2">
		<a href="/campaign/{{$campaign->id}}">
			<div class="content py-1">
				<h5 class='text-dark text-capitalize title'>{{$campaign->name}}</h5>
				<p class='text-dark description mb-1'>{{str_limit($campaign->description, 90)}}</p>
				<div class="row py-1 py-sm-3">
					<div class="col-sm-6 pr-0 pl-3 px-md-3">
						<p class='text-dark text-sm mb-0'><strong>{{ trans('campaigns.date') }}:</strong> {{ date('j', strtotime($campaign->date)) . " de " .date('M', strtotime($campaign->date))}}</p>
					</div>
					<div class="col-sm-6 pr-0 pl-3 px-md-3">
						<p class='text-dark text-sm mb-0'><strong>{{ trans('campaigns.time') }}:</strong> {{date('H:i a', strtotime($campaign->date))}}</p>
					</div>
				</div>
			<hr class="my-1 my-sm-2 d-none d-sm-block">
				<p class="text-dark text-center col-12 px-0 mb-1">{!! trans('campaigns.textCredits') !!}</p>
				<p class="text-dark text-center col-12"><img src="/images/moneda.png" class="credit"> {{$campaign->hours}} Horas</p>
			</div>
		</a>
	</div>
</div>
@endif