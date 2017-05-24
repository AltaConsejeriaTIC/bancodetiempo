<generalmodal name='filter{{$field->name}}' :state='myData.filter{{$field->name}}' state-init='false'>
    <div slot="modal" class='modal-container'>
        <button type="button" @click='myData.filter{{$field->name}} = false' class="close circle-shape"><span aria-hidden="true">×</span></button>
        <p>Entre:  <input type="number" name="{{$field->name}}.from" class="filter"> - <input type="number" name="{{$field->name}}.to" class="filter"></p>
        <button type="button" @click='myData.filter{{$field->name}} = false' class="generate">Generar</button>
        <button type="button" @click='myData.filter{{$field->name}} = false'>Cerrar</button>
    </div>
</generalmodal>
