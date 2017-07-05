<div class="content">

    @foreach($services->forPage($page, 6) as $key => $service)
        <div class='col-md-4 col-xs-12 col-sm-6'>
            @include('partial/serviceBox')
        </div>
    @endforeach
</div>
<div class="col-xs-12 text-center">
    <ul class="pagination pagination-sm" data-list='{{$box}}' data-route='{{$route}}' data-filter="{!! isset($filters) ? implode(':', $filters) : 0 !!}" data-words="{!! isset($words) ? $words : '' !!}">
    	        
        @php($first = $page-5 <= 1 ? 1 : $page-5)
        
        @php($lastPage = ceil($services->count() / 6))
        
        @php($lastPage = $page+5 > $lastPage ? $lastPage : $page+5)
        
        @if($first != 1 || $first == 0)
        	<li data-page='1'>
              <a href="#all">1</a>
          	</li>
          	<li class='space'>
            	<a>...</a>
          	</li>
        @endif
        
        @for($i = $first; $i <= $lastPage; $i ++)

          <li data-page='{{$i}}' @if($i == $page) class='active' @endif >
              <a href="#all">{{$i}}</a>
          </li>

        @endfor
        
        @if(ceil($services->count() / 6) != $i-1 && ceil($services->count() / 6) != 0)
        	<li class='space'>
            	<a>...</a>
          	</li>
        	<li data-page='{{ceil($services->count() / 6)}}'>
              <a href="#all">{{ceil($services->count() / 6)}}</a>
          	</li>
        @endif
        
    </ul>
</div>
