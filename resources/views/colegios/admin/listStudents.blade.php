@extends('layouts.appColegios')
@section('content')

@include('colegios.navAdmin')

<div>
    <div class="container">
        <div class="row py-5">
            <div class="col-4">
                <h4>Listado estudiantes</h4>
            </div>
            <div class="col-4">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Buscar estudiante" aria-label="Buscar estudiante" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button"><i class="fa fa-search"></i></button>
                  </div>
                </div>
            </div>
            <div class="col-4 text-right">
                <button type="button" class="btn btn-success">Hay {{$students->total()}} estudiantes inscritos</button>
            </div>        
        </div>
        
        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Curso</th>
                            <th>Correo</th>
                            <th>Horas completadas</th>
                            <th>Horas Comprometidas</th>
                            <th>Campañas</th>
                        </tr>
                        <tr>
                            <th><input type="text"></th>
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
                        <tr  data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
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
                                        $campaignsNext += $campaignParticipant->campaign->state_id == 1 ? 1 : 0;
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
                        <tr class="collapse" id="collapseExample">
                          <td colspan="8">
                            <div>
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                            </div>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>

@include("footer")

@endsection