@if(isset($campaign))

    <div class='campaign-box'>
        @if(isset($edit))
            <div class="col-md-5 icons-button-content">
                <button class="icons-button" @click="myData.editCampaign{{$campaign->id}}=true"><i
                            class="fa fa-pencil"></i></button>
                <button class="icons-button" @click="myData.deleteCampaign{{$campaign->id}}=true"><i
                            class="fa fa-trash-o"></i></button>
            </div>
        @endif
        <div class="col-md-4 not-padding">
            <a @if(is_null(Auth::User())) @click='myData.login = true' @else href="/campaign/{{$campaign->id}}" @endif>
                <div class="cover" style="background-image : url('/{{$campaign->image}}')">
                </div>
            </a>
        </div>

        <div class="col-md-8">

            <a @if(is_null(Auth::User())) @click='myData.login = true' @else  href="/campaign/{{$campaign->id}}" @endif>
                <div class="content">
                    <h3 class='title2'>{{$campaign->name}}</h3>

                    <div class="space15">
                    </div>
                    <p class='paragraph2'>{{str_limit($campaign->description, 100)}}</p>
                    <div class="col-xs-6 not-padding">
                        <p class='paragraph2'><strong>{{ trans('campaigns.date') }}:</strong> {{ date('j', strtotime($campaign->date)) . " de " .date('M', strtotime($campaign->date))}}</p>
                    </div>
                    <div class="col-xs-6 not-padding">
                        <p class='paragraph2'><strong>{{ trans('campaigns.time') }}:</strong> {{date('H:i a', strtotime($campaign->date))}}</p>
                    </div>
                </div>

                <div class="line"></div>

                <p class="paragraph1 textCredits text-center">{!! trans('campaigns.textCredits') !!}</p>
                <p class="paragraph1 textCredits text-center">{!! trans('campaigns.credits', ['val' => $campaign->hours]) !!}</p>

            </a>

        </div>

    </div>
    @include('campaigns/partial/editCampaign', array("$campaign" => $campaign))
    @include('campaigns/partial/deleteCampaign', array("$campaign" => $campaign))
@endif
