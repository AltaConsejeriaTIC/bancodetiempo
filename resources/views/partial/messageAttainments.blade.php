@if(Session::get('attainment'))
    <div class="popup">
        <div class="shadow"></div>
        <div class="dialogBox">
            <span class="arrow">
                <svg>
                  <polygon points="0,0 20,20 0,20" style="fill:#009fe3;stroke-width:0;fill-rule:evenodd;"></polygon>
                </svg>
            </span>
            {!! Session::get('attainment')->text !!}
        </div>
    </div>
    @{{setMyData('zindex', 10000)}}
@endif
