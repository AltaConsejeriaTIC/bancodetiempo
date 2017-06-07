@foreach($services as $key => $service)
    <div class='col-md-4 col-xs-12 col-sm-6'>
        @include('partial/serviceBox')
    </div>
@endforeach

