<input type="hidden" name="keyConversation" value="{{$conversation->key}}" id='keyConversation'>

@for($index = 0; $index < count($conversation->message); $index++)
    @php($message = $conversation->message[$index])	
    <div class="row">
        <div class="col-xs-12 message @if($message->sender != Auth::User()->id) forMe @else fromMe @endif">

            @if($message->sender != Auth::User()->id)
                @if($conversation->applicant_id == Auth::User()->id)
                    <div class="col-md-1 col-xs-3 image">
                        @include('partial/imageProfile', array('cover' => $conversation->service->user->avatar, 'id' => $conversation->service->user->id, 'border' => '#fff', 'borderSize' => '1px'))
                    </div>
                @else
                    <div class="col-md-1 col-xs-3 image">
                        @include('partial/imageProfile', array('cover' => $conversation->applicant->avatar, 'id' => $conversation->applicant->id, 'border' => '#fff', 'borderSize' => '1px'))
                    </div>
                @endif
             @endif

                <div class='messageText col-md-8 col-xs-8' >
                    {{$message->message}}
                    @if($index == count($conversation->message)-1)
                        @if(isset($message->substitutionsNumber) && $message->substitutionsNumber > 0)
                            <div class="dialogBoxInbox">
                                <span class="arrow">
                                    <svg width='20' height='20'>
                                      <polygon points="0,0 20,20 0,20" style="fill:#009fe3;stroke-width:0;fill-rule:evenodd;"></polygon>
                                    </svg>
                                </span>
                                <span class="close" onClick='jQuery(".dialogBoxInbox").remove()'>x</span>
                                <strong>¡No compartimos tu información personal! :)</strong><br>
                                Por tu seguridad es mejor que uses este chat para cuadrar los detalles de tu intercambio.
                            </div>
                        @endif
                    @endif
                </div>

        </div>
    </div>
@endfor