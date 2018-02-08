@extends('layouts.appColegios')
@section('content')

@include('colegios.navStudent')


<div class="container py-4">
    <div class="row">
        <div class="col-12">
           <div class="row justify-content-center">
             <div class="col-12 text-center">
                 <button type="button" class="btn bg-white float-right" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                      <i class="fa fa-edit"></i>
                  </button>
             </div>

               <div class="col-6 text-center">
                   @include('partial/imageProfile', array('cover' => 'getImg?img='.Auth::user()->avatar.'&w=200', 'id' => 'myAvatarPerfil', 'border' => '#003459', 'borderSize' => '2px'))
                   <h4>{{Auth::User()->first_name}} {{Auth::User()->last_name}}</h4>
                    <h6>Estudiante</h6>
               </div>
               <div class="col-10">
                    <h5>Mi meta</h5>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"  style="width: {{is_null(Auth::user()->credits) ? '0%' : ((Auth::user()->credits*100)/120).'%'}}">
                            <div style="font-size: 0.8rem;">
                                {{is_null(Auth::user()->credits) ? '0' : Auth::user()->credits}}
                            </div>
                        </div>

                    </div>
               </div>
           </div>
        </div>
       
       <div class="col-12 py-4">

           <div class="row">
               <div class="col-12">
                   <p><strong>Intereses:</strong> {{Auth::user()->aboutMe}}</p>
               </div>              
           </div>           
           <div class="row">
               <div class="col-12">
                   <p><strong>Correo:</strong> {{Auth::user()->email2}}</p>
               </div>
           </div>
           <div class="row">
               <div class="col-12">
                   <p><strong>Colegio:</strong> {{Auth::user()->colegio()->name}}</p>
               </div>
           </div>
           <div class="row">
               <div class="col-12">
                   <p><strong>Número de identificación:</strong> {{Auth::user()->document}}</p>
               </div>
           </div>
           <div class="row">
               <div class="col-12">
                   <p><strong>Fecha Nacimiento:</strong> {{Auth::user()->birthDate}}</p>
               </div>
           </div>
           <div class="row">
               <div class="col-12">
                   <p><strong>Curso:</strong> {{Auth::user()->course}}</p>
               </div>
           </div>

           <hr>

       </div>
           
    </div>
    
    <div class="row">
        <div class="col-12">
            <h4>Historial campañas</h4>
        </div>
        <div class="col-12">
            <div class="jumbotron p-1">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Campaña</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach(Auth::user()->campaignParticipants as $campaign)
                            <tr>
                                <td>{{$campaign->campaign->name}}</td>
                                <td>
                                     @if($campaign->campaign->state_id == 1)
                                        Inscrito
                                    @else
                                        @if($campaign->campaign->state_id == 10 && $campaign->presence == 1)
                                            Asitió
                                        @elseif($campaign->campaign->state_id == 10 && $campaign->presence == 0)
                                           No asistió
                                        @else                                                    
                                            Inscrito
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-6">

            <form action="/editStudent" method="post" enctype="multipart/form-data" class="form-group">
                {{csrf_field()}}
                <label class="label-control">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{Auth::user()->first_name}}" required>

                <label class="label-control">Apellido</label>
                <input type="text" name="last_name" class="form-control" value="{{Auth::user()->last_name}}" required>

                <label class="label-control">Correo electronico</label>
                <input type="email" name="email" class="form-control" value="{{Auth::user()->email2}}" required>

                <label class="label-control">Número identificación</label>
                <input type="text" name="document" class="form-control" value="{{Auth::user()->document}}" required>

                <label class="label-control">Intereses</label>
                <textarea name="aboutMe" class="form-control" required>{{Auth::user()->aboutMe}}</textarea>

                <label class="label-control">Fecha nacimiento</label>
                <input type="date" name="date" class="form-control"  value="{{Auth::user()->birthDate}}" required>

                <label class="label-control">Curso</label>
                <select name="course" class="form-control" required>
                    <option value=""></option>
                    <option value="10" @if(Auth::user()->course == 10) selected @endif>Decimo</option>
                    <option value="11" @if(Auth::user()->course == 11) selected @endif>Once</option>
                </select>

                <button type="submit" class="btn btn-primary">Completar</button>
                <button type="button" class="btn bg-white btn-outline-secondary">Cancelar</button>

            </form>
        </div>     

    </div>
</div>

@include("footer")

@endsection