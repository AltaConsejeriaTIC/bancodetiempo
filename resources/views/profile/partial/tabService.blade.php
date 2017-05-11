<article class="col-md-6 col-xs-12 col-sm-6">
    <div class="row">
        <div class="col-md-12">
            <h2 class="title1">{{ trans('profile.myServices') }}</h2>
            <button class="col-xs-12 buttonService background-white" data-toggle="modal" data-target="#NewService">
              <i class="fa fa-plus-square icons" aria-hidden="true"></i>
              <p>{{ trans("profile.newService") }}</p>
            </button>
            {!! Form::open(['url' => '/service/save', 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'form', 'class' => 'form-custom col-xs-12 col-sm-12', 'form-validation' => '']) !!}
              <newservice></newservice>
            {!! Form::close() !!}
        </div>
    </div>
</article>

<article class="col-md-12 panel-services">
    <div class="row">
        @foreach($services as $key => $service)
          <div class='col-md-6 col-xs-12 col-sm-6'>
              @include('partial/serviceBox', array("edit" => "1"))
          </div>
        @endforeach
    </div>
</article>
