@extends('layouts.appColegios')
@section('content')

@include('colegios.navAdmin')

<div>
    <div class="container">
        <div class="row py-5">
            <div class="col-12 col-lg-4">
                <h4>Listado estudiantes</h4>
            </div>
            <div class="col-12 col-md-4">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Buscar estudiante" aria-label="Buscar estudiante" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary d-none" type="button"><i class="fa fa-search"></i></button>
                  </div>
                </div>
            </div>
            <div class="col-12 col-md-4 text-center text-lg-right">
                <button type="button" class="btn btn-success">Hay {{$students->total()}} estudiantes inscritos</button>
                <button type="button" class="btn btn-light" id='downloadListStudent'><i class="fa fa-download"></i></button>
            </div>        
        </div>
        
        <div class="row">
            <div class="col-12">
            <form action="/listadoEstudiantes" method="get" id='filtroEstudiantes' class="table-responsive">
               <input type="hidden" name="download" id="download" value="0">
                <table class="table table-striped">
                    <thead>
                        <tr class="d-none d-lg-table-row">
                            <th></th>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Curso</th>
                            <th>Correo</th>
                            <th>Horas completadas</th>
                            <th>Horas Comprometidas</th>
                            <th>Campañas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr class='d-none d-lg-table-row' data-toggle="collapse" data-target="#collapseDetail{{$student->id}}" aria-expanded="false" aria-controls="collapseExample">
                            <td class="text-center" style="cursor:pointer"><i class="fa fa-caret-down"></i></td>
                            <td>{{$student->document}}</td>
                            <td>{{$student->first_name}}</td>
                            <td>{{$student->last_name}}</td>
                            <td>{{$student->course}}</td>
                            <td>{{$student->email2}}</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"  style="width: {{is_null($student->credits) ? '0%' : ((80*$student->credits)/100).'%'}}">
                                        <div style="font-size: 0.4rem;">
                                            {{is_null($student->credits) ? '0' : $student->credits}}
                                        </div>
                                    </div>
                                    
                                </div>
                            </td>
                            <td class="text-center">
                                @php $campaignsNext = 0; @endphp
                                @foreach($student->campaignParticipants as $campaignParticipant)
                                    @php 
                                        $campaignsNext += $campaignParticipant->campaign->state_id == 1 ? $campaignParticipant->campaign->hours : 0;
                                    @endphp
                                @endforeach
                                {{$campaignsNext}}
                            </td>
                            <td>
                                @foreach($student->campaignParticipants as $campaignParticipant)
                                    {{$campaignParticipant->campaign->name}}<br>
                                @endforeach
                            </td>
                        </tr>
                        <tr class="d-table-row d-lg-none" data-toggle="collapse" data-target="#collapseDetail{{$student->id}}" aria-expanded="false" aria-controls="collapseExample">
                            <td width="35%" class="align-bottom">
                                <img src="{{$student->avatar}}" alt="" width="100%" class="mb-5 rounded-circle">
                                <p class="text-center"><i class="fa fa-caret-down text-lg"></i></p>

                            </td>
                            <td>
                                <p><strong>Nombre:</strong> {{$student->first_name}} {{$student->last_name}}</p>
                                <p><strong>Email:</strong> {{$student->email2}}</p>
                                <p><strong>Curso:</strong> {{$student->course}}</p>
                                <p><strong>Documento:</strong> {{$student->document}}</p>
                                <p><strong>Horas completadas:</strong> {{$student->credits}}</p>
                            </td>
                        </tr>
                        <tr class="collapse" id="collapseDetail{{$student->id}}">
                          <td colspan="8">
                            <div class="row px-3">
                                <div class="col-12 col-lg-4 bg-light p-3">
                                    <h5>Intereses</h5>
                                    <p>{{$student->aboutMe}}</p>
                                </div>
                                <div class="col-12 col-lg-7 ml-lg-3 bg-light p-3">
                                    <h5>Historial Campañas</h5>
                                        <div class="row">
                                            <div class="col-4">
                                                Campaña
                                            </div>
                                            <div class="col-3">Estado</div>
                                            <div class="col-2">Horas</div>
                                            <div class="col-3">Fecha</div>
                                        </div>
                                    @foreach($student->campaignParticipants as $campaignParticipant)
                                        <div class="row">
                                            <div class="col-4">
                                                {{$campaignParticipant->campaign->name}}
                                            </div>
                                            <div class="col-3">
                                                @if($campaignParticipant->campaign->state_id == 1)
                                                    Inscrito
                                                @else
                                                    @if($campaignParticipant->campaign->state_id == 10 && $campaignParticipant->presence == 1)
                                                        Asitió
                                                    @elseif($campaignParticipant->campaign->state_id == 10 && $campaignParticipant->presence == 0)
                                                       No asistió
                                                    @else                                                    
                                                        Inscrito
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="col-2">
                                                {{$campaignParticipant->campaign->hours}}
                                            </div>
                                            <div class="col-3">
                                                {{date("d/m/Y", strtotime($campaignParticipant->campaign->date))}}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
            </div>
        </div>
        
    </div>
</div>

@include("footer")

@endsection
