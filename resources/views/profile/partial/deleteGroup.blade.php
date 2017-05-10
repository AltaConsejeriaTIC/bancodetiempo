<generalmodal  name='deletegroup{{$group->id}}' :state='myData.deletegroup{{$group->id}}' state-init='false'>
    <div slot="modal" class='modal-container'>
        <button type="button" @click='myData.deletegroup{{$group->id}} = false' class="close circle-shape"><span aria-hidden="true">×</span></button>
        {!! Form::open(['url' => 'deleteGroup', 'method' => 'put','enctype' => 'multipart/form-data', 'class' => 'form-custom', 'form-validation' => '']) !!}
            <div class="row">
                <h1 class="title1 text-center">{{ trans("groups.questionDelete") }}</h1>
            </div>
            <div class="row">
               <input type="hidden" name="group_id" value="{{$group->id}}">
                <button type="submit" class="col-xs-12  col-sm-12 button1 background-active-color" >
                    {{trans("groups.yes")}}
                </button>
            </div>
            <br>
            <div class="row">
                <button class="col-xs-12 button10 background-white text-center" @click='myData.deletegroup{{$group->id}} = false'>
                    {{trans("groups.not")}}
                </button>
            </div>
        {!! Form::close() !!}
    </div>
</generalmodal>
