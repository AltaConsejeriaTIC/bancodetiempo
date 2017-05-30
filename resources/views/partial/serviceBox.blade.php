@if(isset($service))

    <div class='service-box'>
        @if(isset($edit))
            <div class="col-md-5 icons-button-content">
                <button class="icons-button" @click='myData.editService{{$service->id}} = true'><i
                            class="fa fa-pencil"></i></button>
                <button class="icons-button  @if($service->conversations->count() > 0) inactive @endif"
                        @if($service->conversations->count() == 0) data-toggle="modal"
                        data-target="#DeleteService{{$service->id}}" @endif><i class="fa fa-trash-o"></i></button>
            </div>
            @include("profile/partial/editService")
            {!! Form::model($service, ['url' => ['serviceDelete', $service->id], 'method' => 'get', 'class' => 'form-custom col-xs-12 col-sm-12']) !!}
            @include('services.partial.deleteService')
            {!!Form::close()!!}
        @endif
        <span class='category'
              onClick='app.__vue__.filterCategory({{$service->category->id}}, "{{$service->category->category}}")'>{{$service->category->category}}</span>
        <a href="/service/{{$service->id}}">
            <div class="cover">
                <img src="/{{$service->image}}" alt=""/>
            </div>
        </a>
        <div class='avatar'>
            @if(is_null(Auth::User()))
                <a @click='myData.login = true'>
                    @if(isset($service->toArray()['user_id']))
                        @include('partial/imageProfile', array('cover' => $service->user->avatar, 'id' => $service->user->id, 'border' => '#fff', 'borderSize' => '2px'))
                    @endif
                </a>
            @else
                <a href="/user/{{$service->user->id}}">
                    @if(isset($service->toArray()['user_id']))
                        @include('partial/imageProfile', array('cover' => $service->user->avatar, 'id' => $service->user->id, 'border' => '#fff', 'borderSize' => '2px'))
                    @endif
                </a>
            @endif

        </div>
        <a href="/service/{{$service->id}}">
            <div class="content">
                <h3 class='title title2'>{{$service->name}}</h3>
                @if(isset($service->toArray()['user_id']))
                    <div class='ranking'>
                        <div>
                            @for($cont = 1 ; $cont <= 5 ; $cont++)
                                @if($cont <= $service->ranking)
                                    <span class='material-icons paragraph9'>grade</span>
                                @else
                                    <span class='material-icons paragraph8 in'>fiber_manual_record</span>
                                @endif
                            @endfor
                        </div>
                    </div>
                @endif
                <div class="space15">
                </div>
                <p class='paragraph2'>{{str_limit($service->description, 100)}}</p>
                <div class='col-xs-12  col-sm-12'>

                    @if(!is_null($service->tags))
                        @foreach($service->tags as $tag)
                            @if($tag->service_id == $service->id)
                                <a class="col-xs-6 input-tag button7 tag-margin" tag='{{ $tag->tag->id }}'
                                   href='/filter?filter={{ $tag->tag->tag }}'>
                                    <span>{{ $tag->tag->tag }}</span>
                                </a>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </a>
    </div>
@endif
