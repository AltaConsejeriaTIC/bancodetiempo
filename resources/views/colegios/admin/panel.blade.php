@extends('layouts.appColegios')
@section('content')

@include('colegios.navAdmin')
<div class="panel">
    <div class="container">
        <div class="row py-5">
            <div class="col-12">   
                <h4>Nuevas Campañas</h4>
                <p>Chulea las campañas que quieras que tus estudiantes vean para inscribirse</p>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <ul class="nav" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#todas" role="tab" aria-controls="todas" aria-selected="true">Todas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#habilitadas" role="tab" aria-controls="habilitadas" aria-selected="false">Habilitadas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#inhabilitadas" role="tab" aria-controls="inhabilitadas" aria-selected="false">Inhabilitadas</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="todas" role="tabpanel" aria-labelledby="todas-tab">
                                <div class="row">
                                   @foreach($todas as $campaign)
                                        <div class='col-6'>
                                            @include('colegios/campaignBox')
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        {{$todas->render("pagination::bootstrap-4")}}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="habilitadas" role="tabpanel" aria-labelledby="habilitadas-tab">
                                Habilitadas
                            </div>
                            <div class="tab-pane fade" id="inhabilitadas" role="tabpanel" aria-labelledby="inhabilitadas-tab">
                                Inhabilitadas
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@include("footer")

@endsection