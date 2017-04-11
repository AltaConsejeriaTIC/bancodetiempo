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
                    <input type="text" name='nameGroup' class="col-xs-12 col-sm-12 col-md-12 validation" data-validations='["required"]'>
                </div>
                <div class="row">
                    <label for="nameGroup" class="paragraph10">{{ trans("profile.descriptionGroup") }}</label>
                </div>
                <div class="row">
                    <textarea name='nameGroup' rows='8' class="col-xs-12 col-sm-12 col-md-12 validation" data-validations='["required"]'></textarea>
                </div>
                <div class="row">
                    <label for="collaboratorGroup" class="paragraph10">{{ trans("profile.collaboratorGroup") }}</label>
                </div>
                <div class="row relative">
                    <input type="text" name="colaborator" id='colaborator' class='autoCompleteUsers col-xs-12 col-sm-12 col-md-12 validation'>
                    <input type="text" name="colaborators" for='colaborator'>
                </div>
                <div class="row">
                    <input type="file" name="imageGroup" id="imageGroup" class="boxPhoto1 col-xs-12 col-sm-12 col-md-12 ">
                    <label for="imageGroup" class="text-center col-xs-12 col-sm-12">
                        <span>Sube una foto</span>
                    </label>
                </div>
            {!! Form::close() !!}
        </div>
</generalmodal>
