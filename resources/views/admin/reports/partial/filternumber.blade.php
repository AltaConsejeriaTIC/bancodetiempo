<generalmodal name='filter{{$field->parameter}}' :state='myData.filter{{$field->parameter}}' state-init='false'>
    <div slot="modal" class='modal-container'>
        <button type="button" @click='myData.filter{{$field->parameter}} = false' class="close circle-shape"><span aria-hidden="true">×</span></button>
        <p>Entre:  <input type="number" name="{{$field->parameter}}.from" class="filter"> - <input type="number" name="{{$field->parameter}}.to" class="filter"></p>
        <button type="button" @click='myData.filter{{$field->parameter}} = false' class="generate">Generar</button>
        <button type="button" @click='myData.filter{{$field->parameter}} = false'>Cerrar</button>
    </div>
</generalmodal>
