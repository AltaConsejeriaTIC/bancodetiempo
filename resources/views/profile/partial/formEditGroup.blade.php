<generalmodal  name='editgroup{{$group->id}}' :state='myData.editgroup{{$group->id}}' state-init='false'>
        <div slot="modal" class='modal-container'>
            <button type="button" @click='myData.editgroup{{$group->id}} = false' class="close circle-shape"><span aria-hidden="true">×</span></button>
            {!! Form::open(['url' => 'editGroup', 'method' => 'put','enctype' => 'multipart/form-data', 'class' => 'form-custom', 'form-validation' => '']) !!}

                <div class="row">
                    <h1 class="title1 text-center">{{ trans("profile.editGroup") }}</h1>
                </div>

                <div class="row">
                    <input type="file" name="imageGroup" id="imageGroup{{$group->id}}" class="boxPhoto1 col-xs-12 col-sm-12 col-md-12 previewSvg validation" >
                    <div  class='col-md-6 col-md-offset-3'>
                        <svg viewbox="0 0 100 100" version="1.1" for='imageGroup{{$group->id}}'>
                            <defs>
                               <pattern id="preview"  patternUnits="userSpaceOnUse" width="100" height="100">
                                 <image  xlink:href="/{{$group->image}}" x="-25" width="150" height="100" />
                               </pattern>
                             </defs>
                             <polygon id="hex" points="50 1 95 25 95 75 50 99 5 75 5 25" fill="url(#preview)" stroke='#0f6784' stroke-width='3px'/>
                        </svg>
                    </div>
                    <p></p>
                    <p class="text-center">
                        <label for="imageGroup{{$group->id}}" class="button1 background-active-color">{{ trans("profile.updateCover") }}</label>
                    </p>

                    <div class="msg" errors='imageGroup'>
                        <p error='required'>{{ trans('errors.required') }}</p>
                    </div>
                </div>

                <div class="row">
                    <label for="nameGroup" class="paragraph10">{{ trans("profile.nameGroup") }}</label>
                </div>
                <div class="row">
                    <input type="text" name='nameGroup' class="col-xs-12 col-sm-12 col-md-12 validation" placeholder='{{ trans("profile.placeHolderNameGroup") }}' data-validations='["required", "max:50", "min:3"]' value='{{$group->name}}'>
                    <div class="msg" errors='nameGroup'>
                        <p error='required'>{{ trans('errors.required') }}</p>
                        <p error='min'>{{trans('errors.min', array('val' => 3))}}</p>
                        <p error='max'>{{trans('errors.max', array('val' => 50))}}</p>
                    </div>
                </div>
                <div class="row">
                    <label for="nameGroup" class="paragraph10">{{ trans("profile.descriptionGroup") }}</label>
                </div>
                <div class="row">
                    <textarea name='descriptionGroup' rows='8' class="col-xs-12 col-sm-12 col-md-12 validation" data-validations='["required", "min:50", "max:250"]'  placeholder='{{ trans("profile.placeHolderDescriptionGroup") }}'>{{$group->description}}</textarea>
                    <div class="msg" errors='descriptionGroup'>
                        <p error='required'>{{ trans('errors.required') }}</p>
                        <p error='min'>{{trans('errors.min', ['val' => 50])}}</p>
                        <p error='max'>{{trans('errors.max', ['val' => 250])}}</p>
                    </div>
                </div>
                <div class="row">
                    <label for="collaboratorGroup" class="paragraph10">{{ trans("profile.collaboratorGroup") }}</label>
                </div>

                <div class="row relative autoComplete">
                    <input type="text" name="collaborator" id='collaboratorGroup{{$group->id}}' class='autoCompleteUsers col-xs-12 col-sm-12 col-md-12'  autocomplete="off" data-collaborators='{{$group->collaborators->implode("user_id", ",")}}'>
                    <input type="hidden" name="collaborators" for='collaboratorGroup{{$group->id}}' class="validation" data-validations='["minArray:2"]'>
                    <div class="msg" errors='collaborators'>
                        <p error='minArray'>{{ trans('profile.errorCollaborators') }}</p>
                    </div>
                </div>


                <div class="row">
                    <label for="linkNetwork" class="paragraph10">{{ trans("profile.linkNetwork") }}</label>
                </div>
                <div class="row">
                   <div class="row">
                       <button type="button" class="button1 background-active-color col-md-8 col-md-offset-2" v-show='!myData.linkFacebook' @click='setMyData("linkFacebook", true)'>
                           <i class="fa fa-facebook" style="font-size: 27px;float:left"></i>{{ trans("profile.link") }}
                       </button>
                       @if($group->facebook != '')
                           @{{setMyData("linkFacebook", true)}}
                       @endif
                       <div class="inputIntegrate col-md-10 col-md-offset-1" v-show='myData.linkFacebook'>
                            <i class="fa fa-facebook" style="font-size: 27px"></i>
                            <input type="text" class="text-center col-md-10" name="linkFacebook" placeholder='{{ trans("profile.placeHolderLinkFacebok") }}' value="{{$group->facebook}}">
                       </div>

                   </div>
                   <br>
                   <div class="row">
                       <button type="button" class="button1 background-active-color col-md-8 col-md-offset-2" v-show='!myData.linkTwitter' @click='setMyData("linkTwitter", true)'>
                           <i class="fa fa-twitter" style="font-size: 27px;float:left"></i>{{ trans("profile.link") }}
                       </button>
                       @if($group->twitter != '')
                           @{{setMyData("linkTwitter", true)}}
                       @endif
                       <div class="inputIntegrate col-md-10 col-md-offset-1" v-show='myData.linkTwitter'>
                            <i class="fa fa-twitter" style="font-size: 27px"></i>
                            <input type="text" class="text-center col-md-10" name="linkTwitter" placeholder='{{ trans("profile.placeHolderLinkTwitter") }}' value="{{$group->twitter}}">
                       </div>
                   </div>
                   <br>
                   <div class="row">
                       <button type="button" class="button1 background-active-color col-md-8 col-md-offset-2" v-show='!myData.linkLinkedin' @click='setMyData("linkLinkedin", true)'>
                           <i class="fa fa-linkedin" style="font-size: 27px;float:left"></i>{{ trans("profile.link") }}
                       </button>
                       @if($group->linkedin != '')
                           @{{setMyData("linkLinkedin", true)}}
                       @endif
                       <div class="inputIntegrate col-md-10 col-md-offset-1" v-show='myData.linkLinkedin'>
                            <i class="fa fa-linkedin" style="font-size: 27px"></i>
                            <input type="text" class="text-center col-md-10" name="linkLinkedin" placeholder='{{ trans("profile.placeHolderLinkLinkedin") }}' value="{{$group->linkedin}}">
                       </div>
                   </div>
                   <br>
                   <div class="row">
                       <button type="button" class="button1 background-active-color col-md-8 col-md-offset-2" v-show='!myData.linkInstagram' @click='setMyData("linkInstagram", true)'>
                           <i class="fa fa-instagram" style="font-size: 27px;float:left"></i>{{ trans("profile.link") }}
                       </button>
                       @if($group->instagram != '')
                           @{{setMyData("linkInstagram", true)}}
                       @endif
                       <div class="inputIntegrate col-md-10 col-md-offset-1" v-show='myData.linkInstagram'>
                            <i class="fa fa-instagram" style="font-size: 27px"></i>
                            <input type="text" class="text-center col-md-10" name="linkInstagram" placeholder='{{ trans("profile.placeHolderLinkInstagram") }}' value="{{$group->instagram}}">
                       </div>
                   </div>
                </div>
                <br>
                <div class="row">
                   <input type="hidden" name="group_id" value='{{$group->id}}'>
                    <button type="submit" class="col-xs-12  col-sm-12 button1 background-active-color" >
                        {{ trans("groups.editGroups") }}
                    </button>
                </div>

                <br>
                <div class="row">
                    <button class="col-xs-12 button10 background-white text-center" @click='myData.editgroup{{$group->id}} = false'>
                        Cancelar
                    </button>
                </div>
            {!! Form::close() !!}
        </div>
</generalmodal>
