<generalmodal  name='pay' :state='myData.pay' state-init='false'>
    <div slot="modal" class='modal-container'>
        <button type="button" @click='myData.pay = false' class="close circle-shape"><span aria-hidden="true">×</span></button>
        {!! Form::open(['url' => 'payParticipant', 'method' => 'post','enctype' => 'multipart/form-data', 'class' => 'form-custom', 'form-validation' => '']) !!}
            <div class="row">
                <h1 class="title1 text-center">{{ trans("campaigns.participants") }}</h1>
            </div>
            @foreach($campaign->participants as $participant)
                @if($participant->confirmed == 1)
                    <div class="row">
                        <input type="checkbox" name="participantsPay[]" value='{{$participant->participant->id}}' class="square" id="participant{{$participant->participant->id}}">
                        <label for="participant{{$participant->participant->id}}" class='col-md-12'>
                            <div class="col-md-2">
                                @include('partial/imageProfile', array('cover' => $participant->participant->avatar, 'id' => $participant->participant->id, 'border' => '#0f6784', 'borderSize' => '1px'))
                            </div>
                            <div class="col-md-9">{{$participant->participant->first_name." ".$participant->participant->last_name}}</div>
                        </label>
                    </div>
                @endif
            @endforeach
            <br>
            <div class="row">
               <input type="hidden" name="campaign_id" value="{{$campaign->id}}">
                <button type="submit" class="col-xs-12  col-sm-12 button1 background-active-green-color" >
                    {{trans("campaigns.pay")}}
                </button>
            </div>
            <br>
            <div class="row">
                <button type="button" class="col-xs-12 button10 background-white text-center" @click='myData.pay = false'>
                    {{trans("campaigns.cancel")}}
                </button>
            </div>
        {!! Form::close() !!}
    </div>
</generalmodal>
