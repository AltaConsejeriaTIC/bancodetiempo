@if(isset($campaign))

    <div class='campaign-box'>
        @if(isset($edit))
            <div class="col-md-5 col-xs-5 icons-button-content">
                <button class="icons-button" @click="myData.editCampaign{{$campaign->id}}=true"><i
                            class="fa fa-pencil"></i></button>
                <button class="icons-button" @click="myData.deleteCampaign{{$campaign->id}}=true"><i
                            class="fa fa-trash-o"></i></button>
            </div>
        @endif
        <div class="col-md-4 col-xs-4 not-padding">
            <a href="/campaign/{{$campaign->id}}">
                <div class="cover" style="background-image : url('getImg?img={{$campaign->image}}&w=400')">
                </div>
            </a>
        </div>

        <div class="col-md-8 col-xs-8">

            <a href="/campaign/{{$campaign->id}}">
                <div class="content">
                    <h3 class='title2 title'>{{$campaign->name}}</h3>

                    <div class="space15 hidden-xs">
                    </div>
                    <p class='paragraph2 description'>{{str_limit($campaign->description, 90)}}</p>
                    <div class="col-xs-12 col-md-6 not-padding">
                        <p class='paragraph2'><strong>{{ trans('campaigns.date') }}:</strong> {{ date('j', strtotime($campaign->date)) . " de " .date('M', strtotime($campaign->date))}}</p>
                    </div>
                    <div class="col-xs-12 col-md-6 not-padding">
                        <p class='paragraph2'><strong>{{ trans('campaigns.time') }}:</strong> {{date('H:i a', strtotime($campaign->date))}}</p>
                    </div>
                </div>

                <div class="line col-xs-12"></div>

                <p class="paragraph1 textCredits text-center col-xs-12 not-padding">{!! trans('campaigns.textCredits') !!}</p>
                <p class="paragraph1 textCredits text-center col-xs-12 not-padding">{!! trans('campaigns.credits', ['val' => $campaign->hours]) !!}</p>

            </a>

        </div>

    </div>
    @include('campaigns/partial/editCampaign', array("$campaign" => $campaign))
    @include('campaigns/partial/deleteCampaign', array("$campaign" => $campaign))
@endif
