<article class="col-md-6 col-xs-12">
    <div class="row">
        <div class="col-md-12">
            <button class="col-xs-12 buttonService background-white" data-toggle="modal" data-target="#NewService">
              <i class="fa fa-plus-square icons" aria-hidden="true"></i>
              <p>{{ trans("profile.newService") }}</p>
            </button>
            @include('services.partial.modalNewService')
        </div>
    </div>
</article>

<article class="col-md-12 panel-services">
    <div class="row">
        @foreach($services as $key => $service)
          <div class='col-md-6 col-xs-12'>
              @include('partial/serviceBox', array("edit" => "1"))
          </div>
        @endforeach
    </div>
</article>
