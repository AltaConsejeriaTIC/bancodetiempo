<generalmodal  name='newgroup' :state='myData.newgroup' state-init='false'>
        <div slot="modal" class='modal-container'>
            <button type="button" @click='myData.newgroup = false' class="close circle-shape"><span aria-hidden="true">×</span></button>
            {!! Form::open(['url' => 'createGroup', 'method' => 'post','enctype' => 'multipart/form-data', 'class' => 'form-custom', 'form-validation' => '']) !!}
                <div class="row">
                    <h1 class="title1 text-center">{{ trans("profile.newGroup") }}</h1>
                </div>
                <div class="row">
                    <label for="nameGroup" class="paragraph10">{{ trans("profile.nameGroup") }}</label>
                </div>
                <div class="row">
                    <input type="text" name='nameGroup' class="col-xs-12 col-sm-12 col-md-12 validation" data-validations='["required", "max:50", "min:4"]'>
                </div>
                <div class="row">
                    <label for="nameGroup" class="paragraph10">{{ trans("profile.descriptionGroup") }}</label>
                </div>
                <div class="row">
                    <textarea name='descriptionGroup' rows='8' class="col-xs-12 col-sm-12 col-md-12 validation" data-validations='["required"]'></textarea>
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
                    <input type="file" name="imageGroup" id="imageGroup" class="boxPhoto1 col-xs-12 col-sm-12 col-md-12 preview">
                    <label for="imageGroup" class="text-center col-xs-12 col-sm-12">
                        <span>Sube una foto</span>
                    </label>
                </div>
                <div class="row">
                    <button type="submit" class="col-xs-12  col-sm-12 button1 background-active-color" >
                        Publicar oferta
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
