@if($conversation->applicant_id == Auth::User()->id)

    @if(!is_null($conversation->deals->last()->user->user_score->where("user_evaluator_id", $conversation->service->user->id)->last()))
        <div class="row">
            <div class="col-md-12">
                <h3 class="title2">{{$conversation->service->user->first_name}} te ha dejado el siguiente comentario:</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="paragraph1">{{$conversation->deals->last()->user->user_score->where("user_evaluator_id", $conversation->service->user->id)->last()->observation}}</p>
            </div>
        </div>
    @endif
    @if(!is_null($conversation->deals->last()->service->user->user_score->where("user_evaluator_id", $conversation->applicant->id)->last()))
        <hr class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title2">Escribiste el siguiente comentario para {{$conversation->service->user->first_name}}:</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="paragraph1">{{$conversation->deals->last()->service->user->user_score->where("user_evaluator_id", $conversation->applicant->id)->last()->observation}}</p>
            </div>
        </div>
    @endif

@else
    @if(!is_null($conversation->deals->last()->service->user->user_score->where("user_evaluator_id", $conversation->applicant->id)->last()))
        <div class="row">
            <div class="col-md-12">
                <h3 class="title2">{{$conversation->applicant->first_name}} te ha dejado el siguiente comentario:</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="paragraph1">{{$conversation->deals->last()->service->user->user_score->where("user_evaluator_id", $conversation->applicant->id)->last()->observation}}</p>
            </div>
        </div>
    @endif
    @if(!is_null($conversation->deals->last()->user->user_score->where("user_evaluator_id", $conversation->service->user->id)->last()))
        <hr class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title2">Escribiste el siguiente comentario para {{$conversation->applicant->first_name}}:</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="paragraph1">{{$conversation->deals->last()->user->user_score->where("user_evaluator_id", $conversation->service->user->id)->last()->observation}}</p>
            </div>
        </div>
    @endif


@endif
