
<div id="show-dialog{{$service->id}}" class="modal fade" tabindex="-1" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="panel-heading modal-title titleContent">Información de la Oferta {{$service->name}}  </h4>
      </div>      
			<div class="modal-body">									
				<div class="row">                      
          <div class="panel panel-primary modalPanel">
            <div class="panel-body">
              <section class="row not-padding">
                <div class="container">
                  <div class='row'>
                    <article class="col-md-8">
                      <h3 class='title title2-service'>{{$service->name}}</h3>
                      <div class="image-service">

                        <img class="col-md-8" src="@if(strpos($service->image, 'http') === false) /{{$service->image}} @else {{$service->image}} @endif" alt="" />
                      </div>
                      <div class="space10"></div>
                      <h3 class='category col-md-8'>Categoria</h3>
                      <span class='category col-md-8'>{{$service->category->category}}</span>
                      <div class="space10"></div>
                      <h3 class='category col-md-8'>Ranking</h3>
                      <div class='ranking left col-md-8 '>
                        <div class='left'>
                          @for($cont = 1 ; $cont <= 5 ; $cont++)
                            @if($cont <= $service->user->ranking)
                              <span class='material-icons paragraph9'>grade</span>
                            @else
                              <span class='material-icons paragraph8 '>fiber_manual_record</span>
                            @endif
                          @endfor
                        </div>
                      </div>
                      <div class="space10"></div>
                      <h3 class='col-md-8'>Descripcion de la oferta</h3>
                        <div class="col-md-8">
                          <div class="content">
                            <p class="paragraph4 ">{{$service->description}}</p>
                            <div class="space15">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <p class="paragraph4">
                            <span class="paragraph4 text-bold">Modalidad:</span>
                            @if($service->presently==1) Presencial @endif
                            @if($service->presently==1 && $service->virtually !== 0) y @endif
                            @if($service->virtually !== 0) Virtual @endif</p>
                          <p class="space15"></p>
                          <p class="paragraph4 text-bold"> Adquiere esta oferta por: </p>
                          <div class="row space10">
                            <div class="col-md-2">
                              <img src="{{ asset('images/moneda.png') }}" class=" moneda icon-nav text-center"></image>
                            </div>
                            <div class="col-md-10">
                              <p class="paragraph4 text-bold">{{$service->value}} <span> Dorados</span></p>
                          </div>
                        </div>

                      <div class='col-xs-12  col-sm-12'>
                        <div class="space10"></div>
                        <h3>Tags</h3>
                        @foreach($service->tags as $tag)
                          @if($tag->service_id == $service->id)
                            <a class="col-xs-6 input-tag button7 tag-margin" tag='{{ $tag->tag->id }}' href='/filter?filter={{ $tag->tag->tag }}'>
                              <span>{{ $tag->tag->tag }}</span>
                            </a>
                          @endif
                        @endforeach
                      </div>

                    <article class=' col-xs-12'>
                      <div class="space10"></div>
                      <h3>Propietario</h3>
                      <div class="row">
                        <div class="col-xs-6 col-xs-offset-3">
                            @include('partial/imageProfile', array('cover' => $service->user->avatar, 'id' =>$service->user->id, 'border' => '#0f6784', 'borderSize' => '3px'))
                        </div>
                      </div>
                      <div >
                        <div class="row">
                          <div class="col-xs-12 ">
                            <h5 class="title1">{{$service->user->first_name." ".$service->user->last_name}}</h5>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 text-center">
                            <p class='paragraph4'>{{$service->user->aboutMe}}</p>
                          </div>
                        </div>
                      </div>

                    </article>

                  </div>
              </section>
            </div>
          </div>
        </div>
      </div>
		</div>			
  </div>
</div>
