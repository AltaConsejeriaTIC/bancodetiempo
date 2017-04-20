<div id="show-dialog{{$campaign->id}}" class="modal fade" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="panel-heading modal-title titleContent">Información de la Oferta {{$campaign->name}}  </h4>
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
                                                    <p class="paragraph4 ">{{$campaign->states->state}}</p>
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
                                                                @include('partial/imageProfile', array('cover' => $campaign->admin->avatar, 'id' =>$campaign->admin->id, 'border' => '#0f6784', 'borderSize' => '3px'))
                                                            </template>
                                                        </avatar>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-xs-12 ">
                                                            <h5 class="title1">{{$campaign->admin->first_name." ".$campaign->admin->last_name}}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="space10"></div>
                                                <h3>Colaboradores</h3>
                                                @foreach($campaign->collaborators as $collaborator)
                                                    <div class="row">
                                                        <div class="col-xs-6 col-xs-offset-3">
                                                            <avatar :cover='myData.cover'>
                                                                <template scope="props">
                                                                    @include('partial/imageProfile', array('cover' => $collaborator->user->avatar, 'id' =>$collaborator->user->id, 'border' => '#0f6784', 'borderSize' => '3px'))
                                                                </template>
                                                            </avatar>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="row">
                                                            <div class="col-xs-12 ">
                                                                <h5 class="title1">{{$collaborator->user->first_name." ".$collaborator->user->last_name}}</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
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
