<div class="col-xs-12 col-sm-7 col-md-8" id='conversation'>
    <div class="row">
        <div class="col-xs-12 visible-xs">
            <a href="#" class='closeConversation'>
                <i class="fa fa-arrow-left" style="color:#0f6784"></i>
            </a>
        </div>
    </div>
    @include('inbox.partial.dealForm')
    <div class="box">
    </div>
    <div class="hidden" id='controllers'>
        <div class="row">
            <form action="#" class="sendMenssages" method="get">
                <div class="col-xs-10">
                    <input name="message" id="message" class="col-xs-12" placeholder="Escribe tu mensaje aquí…">
                    <input type="hidden" id='senderInput' value="{{Auth::id()}}">
                    {{ csrf_field() }}
                </div>
                <div class="col-xs-2">
                    <button type="submit">
                       <i class="fa fa-send" style="color:#0f6784"></i>
                    </button>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>
