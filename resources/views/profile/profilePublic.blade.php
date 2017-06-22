@extends('layouts.app')

@section('content')

    @include('nav',array('type' => 2))

<section class="row">

    <div class="container">

        <article class='col-md-4 col-xs-12 col-sm-6'>

            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    @include('partial/imageProfile', array('cover' => $user->avatar, 'id' =>'user'.$user->id, 'border' => '#fff', 'borderSize' => '3px'))
                </div>
            </div>

            <div>

                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="title1">{{$user->first_name." ".$user->last_name}}</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
						@for($cont = 1 ; $cont <= 5 ; $cont++)
							@if($cont <= $user->ranking)
								<span class='material-icons paragraph9'>grade</span>
							@else
								<span class='material-icons paragraph9 rankingInactive'>grade</span>
							@endif
						@endfor
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-12">
                        <p class='paragraph4'>{{$user->aboutMe}}</p>
                    </div>
                </div>

            </div>

        </article>

        <ul class="nav nav-pills col-md-8 col-xs-12">
            <li class="active">
                <a href="#tabServices" data-toggle="tab">{{ trans('profile.services') }}</a>
            </li>
        </ul>

        <div class="tab-content clearfix col-md-8">
            <div class="tab-pane active" id="tabServices">
               <article class="col-md-12 panel-services">
                    <div class="row">
                        @foreach($services as $key => $service)
                          <div class='col-md-6 col-xs-12 col-sm-6'>
                              @include('partial/serviceBox')
                          </div>
                        @endforeach
                    </div>
                </article>
            </div>

        </div>

    </div>

</section>

@endsection
