<generalmodal name='filter{{$field->parameter}}' :state='myData.filter{{$field->parameter}}' state-init='false'>
    <div slot="modal" class='modal-container'>
        <button type="button" @click='myData.filter{{$field->parameter}} = false' class="close circle-shape"><span aria-hidden="true">×</span></button>
        <p>
            <select name="{{$field->parameter}}" id="filter_{{$field->parameter}}" class="filter">
               <option value=""></option>
                @foreach(json_decode($field->options) as $key => $option)

                    <option value="{{$key}}">{{$option}}</option>

                @endforeach
            </select>
        </p>
        <button type="button" @click='myData.filter{{$field->parameter}} = false' class="generate">Generar</button>
        <button type="button" @click='myData.filter{{$field->parameter}} = false'>Cerrar</button>
    </div>
</generalmodal>
