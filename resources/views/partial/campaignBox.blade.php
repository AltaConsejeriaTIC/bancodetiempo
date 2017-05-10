@if(isset($campaign))

    <div class='service-box'>
        @if(isset($edit))
            <div class="col-md-5 icons-button-content">
                <button class="icons-button" @click="myData.editCampaign{{$campaign->id}}=true"><i
                            class="fa fa-pencil"></i></button>
                <button class="icons-button" @click="myData.deleteCampaign{{$campaign->id}}=true"><i
                            class="fa fa-trash-o"></i></button>
            </div>
        @endif
        <span class='category'>{{$campaign->category->category}}</span>
        <a href="/campaign/{{$campaign->id}}">
            <div class="cover">
                <img src="/{{$campaign->image}}" alt=""/>
            </div>
        </a>
        <div class='avatar' onclick='window.location.href = "/group/{{$campaign->groups->id}}"'>
            @include('partial/imageProfile', array('cover' => $campaign->groups->image, 'id' => 'group'.$campaign->groups->id, 'border' => '#fff', 'borderSize' => '2px'))
        </div>
        <br>
        <a href="/campaign/{{$campaign->id}}">
            <div class="content">
                <h3 class='title title2'>{{$campaign->name}}</h3>

                <div class="space15">
                </div>
                <p class='paragraph2'>{{str_limit($campaign->description, 100)}}</p>

            </div>
        </a>
    </div>
    @include('campaigns/partial/editCampaign', array("$campaign" => $campaign))
    @include('campaigns/partial/deleteCampaign', array("$campaign" => $campaign))
@endif
