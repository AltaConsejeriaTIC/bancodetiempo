@foreach($campaigns as $key => $campaign)
    <div class='col-md-6 col-xs-12 col-sm-6'>
        @include('partial/campaignBox')
    </div>
@endforeach

