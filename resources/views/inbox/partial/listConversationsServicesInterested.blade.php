@foreach($conversations as $conversation)
    <div class="row">
        <!--Avatar-->
        <div class="col-xs-3">
            @include('partial/imageProfile', array('cover' => $conversation->service->user->avatar, 'id' => 'cover'.$conversation->id, 'border' => '#0a475b', 'borderSize' => '1px'))
        </div>
        <!--Name service user-->
        <div class="col-xs-6">
            <div class="row">
                <div class="col-xs-12">
                    <p class="paragraph1">
                        <strong>{{$conversation->service->user->first_name." ".$conversation->service->user->last_name}}</strong>
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
        <div class="col-xs-3">
            <p class="paragraph8">{{$conversation->interval}}</p>
        </div>
    </div>
@endforeach
