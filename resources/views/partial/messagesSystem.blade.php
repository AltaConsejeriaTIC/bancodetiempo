@if(session('message'))
    <div class="row bg-danger">
        <div class="col-xs-12">
            <p>{{session('message')}}</p>
        </div>
    </div>
@endif
