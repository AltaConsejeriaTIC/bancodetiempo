<div class="content">

    @foreach($services->forPage($page, 6) as $key => $service)
        <div class='col-md-4 col-xs-12 col-sm-6'>
            @include('partial/serviceBox')
        </div>
    @endforeach
</div>
<div class="col-xs-12 text-center">
    <ul class="pagination pagination-sm" data-list='{{$box}}' data-route='{{$route}}' data-filter="{!! isset($filters) ? implode(':', $filters) : 0 !!}" data-words="{!! isset($words) ? $words : '' !!}">
        @for($i = 1 ; $i <= ceil($services->count() / 6); $i ++)

          <li data-page='{{$i}}' @if($i == $page) class='active' @endif >
              <a href="#all">{{$i}}</a>
          </li>

        @endfor
    </ul>
</div>
