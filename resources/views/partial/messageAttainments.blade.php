@if(!is_null(Auth::user()))	

	@if(Session::get('coin') == 1)
	    <generalmodal name='winCoin' :state='myData.winCoin' state-init='true' close-time='true'>
	        <div slot="modal" class='box-animation row' style="background: url('/images/AnimacionDorados.gif') no-repeat;height: 600px;background-size: 100%;">

	        </div>
	    </generalmodal>
	@endif
	@if(Session::get('coin') == 2)
	    <generalmodal name='winCoin' :state='myData.winCoin' state-init='true' close-time='true'>
	        <div slot="modal" class='box-animation row'>            
	            <img class="animation" src="images/AnimacionDorados2.gif">
	        </div>
	    </generalmodal>
	@endif
@endif
