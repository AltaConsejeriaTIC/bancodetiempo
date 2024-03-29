@if(isset($campaign))

    <div class='campaign-box'>
        @if(isset($edit))
            <div class="col-md-5 col-xs-5 icons-button-content">
                <button class="icons-button showEditCampaign" data-toggle="modal" data-target="#campaignEdit" data-campaign='{{$campaign->id}}'><i class="fa fa-pencil"></i></button>
                <button class="icons-button" @click="myData.deleteCampaign{{$campaign->id}}=true"><i
                            class="fa fa-trash-o"></i></button>
            </div>
            @include('campaigns/partial/deleteCampaign', array("$campaign" => $campaign))
        @endif
        <div class="col-md-4 col-xs-4 not-padding cover">
            @if($campaign->user->group == 1)
                <i class="iconGroups fa fa-users"  data-toggle="tooltip" title='Esta campaña pertenece a un grupo'></i>
            @endif
            @if($campaign->state_id == 10 || $campaign->state_id == 12)
                <span class="tag">Finalizado</span>
            @endif
            <a href="/campaign/{{$campaign->id}}">
                <div class="cover" style="background-image : url('{{env('APP_URL')}}/getImg?img={{$campaign->image}}&w=400')">
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
    
@endif
