<article class="col-md-12 panel-groups">
    <div class="row">
        <div class="col-md-6">
            <button class="col-xs-12 buttonService background-white" @click='myData.newcampaign = true'>
              <i class="fa fa-plus-square icons" aria-hidden="true"></i>
              <p>{{ trans("groups.newCampaign") }}</p>
            </button>
        </div>
    </div>
    <div class="row">
        @foreach($campaigns as $key => $campaign)
          <div class='col-xs-12'>
              @include('partial/campaignBox')
          </div>

        @endforeach
    </div>
</article>
