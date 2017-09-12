@foreach($conversations as $conversation)
    <div class="row showConversation 
       @if($conversation->notRead) notRead @endif
       " data-conversation='{{$conversation->id}}'>
        <!--Avatar-->
        <div class="col-xs-3 col-sm-5 col-md-3">
            @include('partial/imageProfile', array('cover' => $conversation->applicant->avatar, 'id' => 'cover'.$conversation->id, 'border' => '#0a475b', 'borderSize' => '1px'))
        </div>
        <!--Name service user-->
        <div class="col-xs-6 col-sm-7 col-md-6">
            <div class="row">
                <div class="col-xs-12">
                    <p class="paragraph4">
                        <strong>{{$conversation->applicant->first_name." ".$conversation->applicant->last_name}}</strong>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <p class="paragraph4">
                        {{$conversation->service->name}}
                    </p>
                </div>
            </div>
        </div>
        <!--Conversation time-->
        <div class="col-xs-3 col-sm-12 col-md-3">
            <p class="paragraph8 text-right">{{$conversation->interval}}</p>
        </div>
    </div>
@endforeach
