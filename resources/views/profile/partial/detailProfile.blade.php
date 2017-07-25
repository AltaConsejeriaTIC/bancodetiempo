<article class='col-md-4 col-xs-12 col-sm-6'>

    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            @include('partial/imageProfile', array('cover' => Auth::user()->avatar, 'id' =>'user'.Auth::user()->id, 'border' => '#0f6784', 'borderSize' => '3px', 'extra' => ['svg' => 'for=avatar']))
        </div>
    </div>
    <div v-show='noEdit'>

        <div class="row">
            <div class="col-xs-12">
                <h2 class="title1 text-center">{{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                @for($cont = 1 ; $cont <= 5 ; $cont++)
                    @if($cont <= Auth::user()->ranking)
                        <span class='material-icons paragraph9'>grade</span>
                    @else
                        <span class='material-icons paragraph9 rankingInactive'>grade</span>
                    @endif
                @endfor
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <p class='paragraph4'>{{Auth::user()->aboutMe}}</p>
            </div>
        </div>
        <br>
        <div class="row">
            <button class="col-xs-10 col-xs-offset-1 button1 background-active-color text-center"  @click='showEdit'>{{ trans("profile.editProfile") }}</button>
        </div>

        <div class="space10"></div>

        <div class="row border">

            <div class="col-sm-12">

                <div class="space20"></div>

                <p class="col-xs-2">
                  <img src="{{ asset('images/moneda.png') }}" class="not-padding moneda icon-nav"></image>
                </p>

                <p class="col-xs-10">
                    <span class="text-bold">
                        {{ Auth::user()->credits ? Auth::user()->credits : 0 }} {{ Auth::user()->credits == 1 ? trans('nav.credit') : trans('nav.credits') }}
                    </span>
                    <span class="space4"></span>
                    <span class="paragraph6">
                        {{trans('profile.descriptionCredits')}}
                    </span>
                    <br>
                </p>

                <div class="space20"></div>

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 hidden-xs">
                 {!! Form::open(['url' => 'deactivateAccount', 'method' => 'post', 'class' => 'form-custom col-xs-12 col-sm-12']) !!}
                    <input type="hidden" name="token" value="{{ csrf_token() }}">
                    <deactivate></deactivate>
                {!! Form::close() !!}
                <button class="col-xs-12 button10 background-white" data-toggle="modal" data-target="#deactivate">{{ trans('profile.desactiveAccount') }}</button>
            </div>
        </div>


    </div>

    <div v-show='edit'>

        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <label for='avatar' class="button1 background-active-color text-center">{{ trans('profile.updateCover') }}</label>
                <p class="avatarMsg hidden">El peso màximo de la imagen debe ser de 3 Megas.</p>
            </div>
        </div>

        {!! Form::open(['url' => 'profile/update', 'method' => 'put','enctype' => 'multipart/form-data', 'role' => 'form', 'class' => 'form-custom', 'id' => 'form', 'form-validation' => '']) !!}
            <input type="file" name='avatar' id='avatar' class='hidden previewSvg'/>
            @include('profile.partial.formEditProfile')
            <div class="col-xs-12">
                <button class="col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0 button10 background-white text-center" type='button' @click='hiddenEdit'>{{ trans('profile.cancel') }}</button>
            </div>
        {!! Form::close() !!}

    </div>

</article>
