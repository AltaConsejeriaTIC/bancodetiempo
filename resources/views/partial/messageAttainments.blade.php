@if(!is_null(Auth::user()))	

	@if(Session::get('coin') == 1)
	    <generalmodal  name='winCoin' :state='myData.winCoin' state-init='true'>
	        <div slot="modal" class='box-animation row'>            
	            <img class="animation" src="images/AnimacionDorados.gif">
	        </div>
	    </generalmodal>
	    <modaltimeoff name="winCoin">
	    </modaltimeoff>
	@endif
	@if(Session::get('coin') == 2)
	    <generalmodal  name='winCoin' :state='myData.winCoin' state-init='true'>
	        <div slot="modal" class='box-animation row'>            
	            <img class="animation" src="images/AnimacionDorados2.gif">
	        </div>
	    </generalmodal>
	    <modaltimeoff name="winCoin">
	    </modaltimeoff>
	@endif
@endif