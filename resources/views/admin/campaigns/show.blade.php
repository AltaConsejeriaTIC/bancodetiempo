<div id="show-dialog{{$campaign->id}}" class="modal fade" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="panel-heading modal-title titleContent text-center">Información de la Campaña <br> {{$campaign->name}}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="panel panel-primary modalPanel">
                        <div class="panel-body">
                            <section class="row not-padding">

                                <article class="col-md-12">
                                    <div class="row">
                                        <img class="col-md-12" src="{{$campaign->image}}"  alt=""/>
                                    </div>
                                    <div class="row">
                                        <h3>Descripcion del grupo</h3>
                                        <p class="col-xs-12">{{$campaign->description}}</p>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <h3>Estado</h3>
                                            <p>{{$campaign->state->state}}</p>
                                        </div>
                                        <div class="col-xs-4">
                                            <h3>Creditos</h3>
                                            <p>{{$campaign->credits}}</p>
                                        </div>
                                        <div class="col-xs-4">
                                            <h3>Horas</h3>
                                            <p>{{$campaign->hours}}</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-6">
                                            <h3>Fecha</h3>
                                            <p>{{$campaign->date}}</p>
                                        </div>
                                        <div class="col-xs-6">
                                            <h3>Fecha límite de donaciones</h3>
                                            <p>{{$campaign->date_donations}}</p>
                                        </div>

                                    </div>

                                    <h3 class='col-md-8'>
                                        Participantes
                                        <a href='/adminCampaigns/participant/{{$campaign->id}}/download' class="btn btn-raised btn-primary btn-xs" >
                                                <i class="material-icons">cloud_download</i>
                                        </a>
                                    </h3>
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Email</th>
                                                <th>Fecha inscripcion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @foreach($campaign->participants as $participant)
                                            <tr>
                                                <td>{{$participant->participant->first_name." ".$participant->participant->last_name}}</td>
                                                <td>{{$participant->participant->email2}}</td>
                                                <td>{{$participant->created_at}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </article>

                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
