<generalmodal name='filter{{$field->name}}' :state='myData.filter{{$field->name}}' state-init='false'>
    <div slot="modal" class='modal-container'>
        <button type="button" @click='myData.filter{{$field->name}} = false' class="close circle-shape"><span aria-hidden="true">×</span></button>
        <p>
            <select name="{{$field->name}}" id="filter_{{$field->name}}" class="filter">
               <option value=""></option>
                @foreach(json_decode($field->options) as $key => $option)

                    <option value="{{$key}}">{{$option}}</option>

                @endforeach
            </select>
        </p>
        <button type="button" @click='myData.filter{{$field->name}} = false' class="generate">Generar</button>
        <button type="button" @click='myData.filter{{$field->name}} = false'>Cerrar</button>
    </div>
</generalmodal>
