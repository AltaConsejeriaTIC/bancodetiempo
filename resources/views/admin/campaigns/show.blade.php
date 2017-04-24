<div id="show-dialog{{$campaign->id}}" class="modal fade" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="panel-heading modal-title titleContent">Información de la Campaña {{$campaign->name}}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="panel panel-primary modalPanel">
                        <div class="panel-body">
                            <section class="row not-padding">
                                <div class="container">
                                    <div class='row'>
                                        <article class="col-md-8">
                                            <h3 class='title title2-service'>{{$campaign->name}}</h3>
                                            <div class="image-service">
                                                <img class="col-md-8"
                                                     src="@if(strpos($campaign->image, 'http') === false) /{{$campaign->image}} @else {{$campaign->image}} @endif"
                                                     alt=""/>
                                            </div>
                                            <div class="space10"></div>
                                            <h3 class='col-md-8'>Descripcion del grupo</h3>
                                            <div class="col-md-8">
                                                <div class="content">
                                                    <p class="paragraph4 ">{{$campaign->description}}</p>
                                                    <div class="space15">
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class='col-md-8'>Estado</h3>
                                            <div class="col-md-8">
                                                <div class="content">
                                                    <p class="paragraph4 ">{{$campaign->state->state}}</p>
                                                    <div class="space15">
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class='col-md-8'>Creditos</h3>
                                            <div class="col-md-8">
                                                <div class="content">
                                                    <p class="paragraph4 ">{{$campaign->credits}}</p>
                                                    <div class="space15">
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class='col-md-8'>Horas</h3>
                                            <div class="col-md-8">
                                                <div class="content">
                                                    <p class="paragraph4 ">{{$campaign->hours}}</p>
                                                    <div class="space15">
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class='col-md-8'>Fecha</h3>
                                            <div class="col-md-8">
                                                <div class="content">
                                                    <p class="paragraph4 ">{{$campaign->date}}</p>
                                                    <div class="space15">
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class='col-md-8'>Fecha límite de donaciones</h3>
                                            <div class="col-md-8">
                                                <div class="content">
                                                    <p class="paragraph4 ">{{$campaign->date_donations}}</p>
                                                    <div class="space15">
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class='col-md-8'>Participantes</h3>
                                            <div class="col-md-8">
                                                <div class="content">
                                                    @foreach($campaign->participants as $participant)
                                                        <p class="paragraph4 ">{{$participant->participant->first_name.' '.$participant->participant->last_name}}</p>
                                                        <div class="space5"></div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
