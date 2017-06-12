<div class="content">

    @foreach($services->forPage($page, 6) as $key => $service)
        <div class='col-md-4 col-xs-12 col-sm-6'>
            @include('partial/serviceBox')
        </div>
    @endforeach
</div>
<input type="hidden" id="filters" value="{!! isset($filters) ? implode(':', $filters) : 0 !!}">
<div class="col-xs-12 text-center">
    <ul class="pagination pagination-sm" data-list='all' data-route='/listService'>
        @for($i = 1 ; $i <= ceil($services->count() / 6); $i ++)

          <li data-page='{{$i}}' @if($i == $page) class='active' @endif >
              <a href="#all">{{$i}}</a>
          </li>

        @endfor
    </ul>
</div>
