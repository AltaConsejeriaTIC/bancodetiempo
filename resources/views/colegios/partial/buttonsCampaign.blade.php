<button type="button" class="btn-switch @if($campaign->campaignEnableInSchool()) enable btn_campaign_remove @else btn_campaign_add @endif" data-campaign='{{$campaign->id}}' data-name='{{$campaign->name}}' data-toggle="modal"  @if(!$campaign->campaignEnableInSchool()) data-target="#modal_habilitar" @else data-target="#modal_deshabilitar" @endif></button>

<div class="modal fade" id="modal_habilitar" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		<div class="modal-content py-2">
			<button type="button" class="close text-right px-3" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			
			<form action="/addCampaignToSchool" method="post">
				{{csrf_field()}}
				<div class="modal-body">
					<h4 class="text-center">Habilitar la campaña</h4>
					<input type="hidden" class="form-control" id="campaign_id" name="campaign_id">
					<p class="text-center">¿Deseas <strong>habilitar</strong> la campaña<br> "<strong id="campaign_name"></strong>"? </p>
				</div>      
				<div class="row justify-content-center"> 
					<button type='submit' class="btn btn-info bg-cambalachea col-10">Habilitar</button>
				</div>
				<div class="row justify-content-center py-2"> 
					<button type="button" class="btn btn-outline-info col-10" data-dismiss="modal">Cancelar</button>
				</div>        
				
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="modal_deshabilitar" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		<div class="modal-content py-2">
			<button type="button" class="close text-right px-3" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			
			<form action="/removeCampaignToSchool" method="post">
				{{csrf_field()}}
				<div class="modal-body">
					<h4 class="text-center">Deshabilitar la campaña</h4>
					<input type="hidden" class="form-control" id="campaign_id" name="campaign_id">
					<p class="text-center">¿Deseas <strong>deshabilitar</strong> la campaña<br> "<strong id="campaign_name"></strong>"? </p>
				</div>      
				<div class="row justify-content-center"> 
					<button type='submit' class="btn btn-info bg-cambalachea col-10">Deshabilitar</button>
				</div>
				<div class="row justify-content-center py-2"> 
					<button type="button" class="btn btn-outline-info col-10" data-dismiss="modal">Cancelar</button>
				</div>        
				
			</form>
		</div>
	</div>
</div>
