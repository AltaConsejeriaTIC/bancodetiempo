@if($deal->user_id == Auth::User()->id)

    @if(!is_null($deal->offerer_observation))
        <div class="row">
            <div class="col-md-12">
                <h3 class="title2">{{$deal->service->user->first_name}} te ha dejado el siguiente comentario:</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="paragraph1">{{$deal->offerer_observation}}</p>
            </div>
        </div>
    @endif
    @if(!is_null($deal->applicant_observation))
        <hr class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title2">Escribiste el siguiente comentario para {{$deal->service->user->first_name}}:</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="paragraph1">{{$deal->applicant_observation}}</p>
            </div>
        </div>
    @endif

@else
    @if(!is_null($deal->applicant_observation))
        <div class="row">
            <div class="col-md-12">
                <h3 class="title2">{{$deal->user->first_name}} te ha dejado el siguiente comentario:</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="paragraph1">{{$deal->applicant_observation}}</p>
            </div>
        </div>
    @endif
    @if(!is_null($deal->offerer_observation))
        <hr class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title2">Escribiste el siguiente comentario para {{$deal->user->first_name}}:</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="paragraph1">{{$deal->offerer_observation}}</p>
            </div>
        </div>
    @endif


@endif
