<generalmodal  name='newgroup' :state='myData.newgroup' state-init='false'>
        <div slot="modal" class='modal-container'>
            <button type="button" @click='myData.newgroup = false' class="close circle-shape"><span aria-hidden="true">×</span></button>
            {!! Form::open(['url' => 'createGroup', 'method' => 'post','enctype' => 'multipart/form-data', 'class' => 'form-custom', 'form-validation' => '']) !!}

                <div class="row">
                    <h1 class="title1 text-center">{{ trans("profile.newGroup") }}</h1>
                </div>

                <div class="row">
                    <input type="file" name="imageGroup" id="imageGroup" class="boxPhoto1 col-xs-12 col-sm-12 col-md-12 previewSvg validation" data-validations='["requiredImage"]'>
                    <div  class='col-md-6 col-md-offset-3'>
                        <svg viewbox="0 0 100 100" version="1.1" for='imageGroup'>
                            <defs>
                               <pattern id="preview"  patternUnits="userSpaceOnUse" width="100" height="100">
                                 <image  xlink:href="/images/default.jpg" x="-25" width="150" height="100" />
                               </pattern>
                             </defs>
                             <polygon id="hex" points="50 1 95 25 95 75 50 99 5 75 5 25" fill="url(#preview)" stroke='#0f6784' stroke-width='3px'/>
                        </svg>
                    </div>
                    <p></p>
                    <p class="text-center">
                        <label for="imageGroup" class="button1 background-active-color">{{ trans("profile.updateCover") }}</label>
                    </p>

                    <div class="msg" errors='imageGroup'>
                        <p error='required'>{{ trans('errors.required') }}</p>
                    </div>
                </div>

                <div class="row">
                    <label for="nameGroup" class="paragraph10">{{ trans("profile.nameGroup") }}</label>
                </div>
                <div class="row">
                    <input type="text" name='nameGroup' class="col-xs-12 col-sm-12 col-md-12 validation" placeholder='{{ trans("profile.placeHolderNameGroup") }}' data-validations='["required", "max:50", "min:3"]'>
                    <div class="msg" errors='nameGroup'>
                        <p error='required'>{{ trans('errors.required') }}</p>
                        <p error='min'>{{trans('groups.errorMinName')}}</p>
                        <p error='max'>{{trans('groups.errorMaxName')}}</p>
                    </div>
                </div>
                <div class="row">
                    <label for="nameGroup" class="paragraph10">{{ trans("profile.descriptionGroup") }}</label>
                </div>
                <div class="row">
                    <textarea name='descriptionGroup' rows='8' class="col-xs-12 col-sm-12 col-md-12 validation" data-validations='["required", "min:50", "max:250"]'  placeholder='{{ trans("profile.placeHolderDescriptionGroup") }}'></textarea>
                    <div class="msg" errors='descriptionGroup'>
                        <p error='required'>{{ trans('errors.required') }}</p>
                        <p error='min'>{{trans('groups.errorMinDescription')}}</p>
                        <p error='max'>{{trans('groups.errorMaxDescription')}}</p>
                    </div>
                </div>
                <div class="row">
                    <label for="collaboratorGroup" class="paragraph10">{{ trans("profile.collaboratorGroup") }}</label>
                </div>
                <div class="row relative autoComplete">
                    <input type="text" name="collaborator" id='collaborator' class='autoCompleteUsers col-xs-12 col-sm-12 col-md-12'>
                    <input type="hidden" name="collaborators" for='collaborator' class="validation" data-validations='["minArray:2"]'>
                    <div class="msg" errors='collaborators'>
                        <p error='minArray'>{{ trans('profile.errorCollaborators') }}</p>
                    </div>
                </div>

                <div class="row">
                    <button type="submit" class="col-xs-12  col-sm-12 button1 background-active-color" >
                        {{ trans("groups.newGroups") }}
                    </button>
                </div>
                <br>
                <div class="row">
                    <button class="col-xs-12 button10 background-white text-center" @click='myData.newgroup = false'>
                        Cancelar
                    </button>
                </div>
            {!! Form::close() !!}
        </div>
</generalmodal>
