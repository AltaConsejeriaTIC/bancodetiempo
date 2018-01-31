@extends('layouts.appColegios')

@section('script')
    <script>
        jQuery(document).ready(function(){
            
            jQuery('#modal_cancelar_inscripcion').on('show.bs.modal', function (event) {
              var button = jQuery(event.relatedTarget)
              var campaign = button.data('campaign');
              var name = button.data('name');
              var modal = jQuery(this)
              modal.find('#campaign_name').text(name)
              modal.find('#campaign_id').val(campaign)
            })
        })
    </script>
@endsection

@section('content')

@include('colegios.navStudent')

<div class="panel">
    <div class="container">
        <div class="row py-5">
            <div class="col-12">   
                <h4>Mis compromisos</h4>
                <p>Puedes ver a que campañas estas inscrito y cancelar en cualquier momentola inscripción</p>
            </div>            
            @if(session()->has('msg'))
                <div class="col-12 alert-success py-2" hide-in='5000'>
                    {{session("msg")}}
                </div>
            @endif
            
            <div class="col-12">
               
               <div class="row">
                   
                   <div class="col-6">
                       <h5>Mis campañas</h5>
                       <div class="row">
                           @foreach($campaigns as $campaign)
                                <div class='col-12'>
                                    @include('colegios/campaignBox')
                                    <button type="button" class="btn btn-danger" data-target="#modal_cancelar_inscripcion" data-toggle="modal" data-campaign='{{$campaign->id}}' data-name='{{$campaign->name}}'>Cancelar inscripción</button>
                                </div>
                           @endforeach
                       </div>
                   </div>
                   <div class="col-6">
                       <h5>Calandario</h5>
                       <div class="row">
                           @foreach($campaigns as $campaign)
                                <div class='col-12'>
                                   <div class="row bg-white  py-3">
                                       <div class="col-3">
                                           <h2>{{ date("d", strtotime($campaign->date)) }}</h2>
                                           <h5>{{ date("F", strtotime($campaign->date)) }}</h5>
                                        </div>
                                        <div class="col-9 text-center">
                                            <button type="button" class="btn btn-info col-8">
                                                {{$campaign->name}}<br>
                                                {{ date("H:i", strtotime($campaign->date)) }}
                                            </button>
                                        </div>
                                   </div>
                                    
                                </div>
                           @endforeach
                       </div>
                   </div>
                   
               </div>
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_cancelar_inscripcion" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content py-2">
        <button type="button" class="close text-right px-3" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      
    <form action="/student/unregistration" method="post">
        {{csrf_field()}}
      <div class="modal-body">
            <h4 class="text-center">Cancelar inscripción a la campaña</h4>
            <input type="hidden" class="form-control" id="campaign_id" name="campaign_id">
            <p class="text-center">¿Deseas <strong>cancelar la inscripción</strong> a la campaña "<strong id="campaign_name"></strong>"? </p>
      </div>      
       <div class="row justify-content-center"> 
            <button type='submit' class="btn btn-info bg-cambalachea col-10">Cancelar inscripción</button>
       </div>
        <div class="row justify-content-center py-2"> 
            <button type="button" class="btn btn-outline-info col-10" data-dismiss="modal">Cancelar</button>
       </div>        
      
    </form>
    </div>
  </div>
</div>

@include("footer")

@endsection