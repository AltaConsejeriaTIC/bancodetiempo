<div id="show-dialog{{$group->id}}" class="modal fade" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="panel-heading modal-title titleContent text-center">Información de la Oferta <br>{{$group->name}}  </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="panel panel-primary modalPanel">
                        <div class="panel-body">
                            <section class="row not-padding">
                                <div class="container">
                                    <div class='row'>
                                        <article class="col-md-8">
                                            <h3>{{$group->name}}</h3>
                                            <div>
                                                <img class="col-md-8"
                                                     src="@if(strpos($group->image, 'http') === false) /{{$group->image}} @else {{$group->image}} @endif"
                                                     alt=""/>
                                            </div>
                                            <div class="space10"></div>
                                            <h3 class='col-md-8'>Descripcion del grupo</h3>
                                            <div class="col-md-8">
                                                <div class="content">
                                                    <p>{{$group->description}}</p>
                                                    <div class="space15">
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class='col-md-8'>Estado</h3>
                                            <div class="col-md-8">
                                                <div class="content">
                                                    <p >{{$group->state->state}}</p>
                                                    <div class="space15">
                                                    </div>
                                                </div>
                                            </div>
                                            <article class="col-md-8">
                                                <div class="space10"></div>
                                                <h3>Administrador</h3>
                                                <div class="row">
                                                    <div class="col-xs-6 col-xs-offset-3">
                                                        <avatar :cover='myData.cover'>
                                                            <template scope="props">
                                                                @include('partial/imageProfile', array('cover' => $group->admin->avatar, 'id' =>$group->admin->id, 'border' => '#0f6784', 'borderSize' => '3px'))
                                                            </template>
                                                        </avatar>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-xs-12 ">
                                                            <h5>{{$group->admin->first_name." ".$group->admin->last_name}}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="space10"></div>
                                                <h3>Colaboradores</h3>
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombre</th>
                                                            <th>Email</th>
                                                            <th>Fecha inscripcion</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                @foreach($group->collaborators as $collaborator)

                                                            <tr>
                                                                <td>{{$collaborator->user->first_name." ".$collaborator->user->last_name}}</td>
                                                                <td>{{$collaborator->user->email2}}</td>
                                                                <td>{{$collaborator->created_at}}</td>
                                                            </tr>

                                                @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="space10"></div>
                                                <h3>Campañas</h3>
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombre</th>
                                                            <th>Horas</th>
                                                            <th>Dorados</th>
                                                            <th>Fecha</th>
                                                            <th>Estado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($group->campaigns as $campaign)
                                                        <tr>
                                                            <td>{{$campaign->name}}</td>
                                                            <td>{{$campaign->hours}}</td>
                                                            <td>{{$campaign->credits}}</td>
                                                            <td>{{$campaign->date}}</td>
                                                            <td>{{$campaign->state->state}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>

                                            </article>
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
