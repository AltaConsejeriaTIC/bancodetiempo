@if(Auth::user()->aboutMe == '' || Auth::user()->services->count() == 0)
<div class="container" id='messagesProfile'>
    <div class="row bg-info">
        <button type="button" class="close col-xs-1 col-xs-offset-11 text-center"><span>×</span></button>
        @if(Auth::user()->aboutMe == '')
            <div class="col-xs-12">
                <p>{!! trans('home.completeProfileMsg1') !!}</p>
            </div>
        @endif
        @if(Auth::user()->services->count() == 0)
            <div class="col-xs-12">
                <p>{!! trans('home.completeProfileMsg2') !!}</p>
            </div>
        @endif
    </div>
</div>
@endif
