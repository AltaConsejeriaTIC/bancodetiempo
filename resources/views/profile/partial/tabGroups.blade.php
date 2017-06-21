<article class="col-md-12 panel-groups">
    <div class="row">
        <div class="col-md-6">
            <button class="col-xs-12 buttonService background-white" @click='myData.newgroup = true'>
              <i class="fa fa-plus-square icons" aria-hidden="true"></i>
              <p>{{ trans("profile.newGroup") }}</p>
            </button>
        </div>
    </div>
    <div class="row">
        @foreach($myGroups as $key => $group)
          <div class='col-md-6 col-xs-12'>
              @include('partial/groupBox', array("edit" => 1))
          </div>
          @include("profile/partial/deleteGroup")
        @endforeach
    </div>
</article>
