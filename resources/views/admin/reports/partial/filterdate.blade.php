<generalmodal name='filter{{$field->name}}' :state='myData.filter{{$field->name}}' state-init='false'>
    <div slot="modal" class='modal-container dateFilter'>
        <button type="button" @click='myData.filter{{$field->name}} = false' class="close circle-shape"><span aria-hidden="true">×</span></button>
        <p>Entre:  <input type="text" name="{{$field->name}}" class="filter dateFrom"> - <input type="text" name="{{$field->name}}" class="filter dateTo"></p>
        <button type="button" @click='myData.filter{{$field->name}} = false' class="generate">Generar</button>
        <button type="button" @click='myData.filter{{$field->name}} = false'>Cerrar</button>
    </div>
</generalmodal>
