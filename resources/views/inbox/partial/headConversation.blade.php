<div class="head row">
    @if($conversation->applicant_id == Auth::User()->id)
        <div class="col-md-1 col-xs-3">
            <a href="/user/{{$conversation->service->user->id}}">
                @include('partial/imageProfile', array('cover' => $conversation->service->user->avatar, 'id' => 'profileImg', 'border' => '#fff', 'borderSize' => '1px'))
            </a>
        </div>
        <div class='col-xs-9'>
            <h1 class='title2 text-white'>{{$conversation->service->user->first_name." ".$conversation->service->user->last_name}}</h1>
            <i class="text-white">{{$conversation->service->name}}</i>
        </div>
    @else
        <div class="col-md-1 col-xs-3">
            <a href="/user/{{$conversation->applicant->id}}">
                @include('partial/imageProfile', array('cover' => $conversation->applicant->avatar, 'id' => 'profileImg', 'border' => '#fff', 'borderSize' => '1px'))
            </a>
        </div>
        <div class='col-xs-9'>
            <h1 class='title2 text-white'>{{$conversation->applicant->first_name." ".$conversation->applicant->last_name}}</h1>
            <i class="text-white">{{$conversation->service->name}}</i>
        </div>
    @endif
</div>
