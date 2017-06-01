@extends('layouts.appAdmin')

@section('content')

<div class="container" id="app">
    <div class="panel panel-default relative">

        <div class="row">

            <div class="col-xs-12">
                <h2 class="title2"> <a href="/admin/reports">Volver</a></h2>
                <h1 class="title2">{{$report->name}}</h1>
            </div>

        </div>
        <hr>
        <article id='report'>



        </article>

        <div id="fields">

            <div class="row">
                <div class="col-xs-12">
                    <h3 class="title2">
                        Campos disponibles <i class="material-icons text-white fieldsChange">remove</i>
                    </h3>
                </div>
            </div>
            <div id='boxFields'>
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="form-custom fieldReport">
                            @foreach($fields as $field)

                                <li>
                                    <input type="checkbox" value="{{$field->parameter}}" name="fields[]" class="square" id='field{{$field->id}}' field='{{$field->parameter}}'>
                                    <label for="field{{$field->id}}">{{$field->name}} @if($field->type != '')<button type="button" class="material-icons icon" @click='myData.filter{{$field->parameter}} = true'>visibility</button>@endif</label>
                                </li>
                                @if($field->type != '')
                                    @include("admin/reports/partial/filter".$field->type)
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <input type="hidden" value="asc" name="order" id='order'>
                        <input type="hidden" value="id" name="orderBy" id="orderBy">
                        <button type="button" class="generate">Generar</button>
                        <button type="button" class="save">Guardar</button>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    var data = {
        '_token' : '{{ csrf_token() }}',
        'fields' : {!! is_null($report->fields) ? '[]' : $report->fields !!},
        'order' : '{!! is_null($report->order) ? "asc" : json_decode($report->order)->order !!}',
        'orderBy' : '{!! is_null($report->order) ? "id" : json_decode($report->order)->orderBy !!}',
        'filters' : {!! is_null($report->filters) ? '{}' : $report->filters !!}
    }

    jQuery(document).ready(start)

    function start(){
        jQuery(".fieldReport > li > input").on('change', setFields);
        jQuery(".generate").on('click', makeReport);
        jQuery(".save").on('click', saveReport);
        jQuery("#fields").draggable({ cursor: "crosshair" });
        jQuery(".order").on('click', orderChange);
        jQuery(".filter").on("change", addFilter);
        jQuery(".fieldsChange").on("click", changeBoxFilter)
        getDate();
        markFields();
        markFilters();
        makeReport();
    }

    function markFields(){
        for(var index in data.fields){
            jQuery("input[field='"+data.fields[index]+"']").prop("checked", true)
        }
    }

    function markFilters(){
        for(var index in data.filters){
            jQuery("input[name='"+index+"']").val(data.filters[index]);
        }
        for(var index in data.filters){
            jQuery("select[name='"+index+"'] option[value='"+data.filters[index]+"']").prop("selected", true);
        }
    }

    function changeBoxFilter(){
        if(jQuery("#boxFields").hasClass('contract')){
            jQuery("#boxFields").removeClass('contract');
            jQuery(".fieldsChange").html('remove');

        }else{
            jQuery("#boxFields").addClass('contract');
            jQuery(".fieldsChange").html('add');
        }
    }

    function addFilter(){
        var index = jQuery(this).attr('name');
        var value = jQuery(this).val();

        i = index.split('.');

        if(i.length > 1){

            if(data['filters'][i[0]] === undefined){
                data['filters'][i[0]] = {'from' : '', 'to' : ''};
            }
            if(value == ''){
                delete data['filters'][i[0]];
            }else{
                data['filters'][i[0]][i[1]] = value;
            }


        }else{
            if(value == ''){
                delete data['filters'][index];
            }else{
                data['filters'][index] = value;
            }

        }

    }

    function setFields(){
        if(jQuery(this).is(':checked')){
            data['fields'].push(jQuery(this).val());
        }else{
            index = data['fields'].indexOf(jQuery(this).val());
            delete data['fields'][index];
            reOrderFields();
        }
        data.orderBy = data['fields'][0];
    }

    function reOrderFields(){
        fields = data['fields'];
        data['fields'] = [];
        for(var i in fields){
            data['fields'].push(fields[i]);
        }

    }

    function saveReport(){
        jQuery.ajax({
            type: "POST",
            url: "/admin/saveReport/{{ $report->id }}",
            data: data,
            success: function(datos){
                jQuery("body").append(datos);
            }
        });
    }

    function makeReport(){

        jQuery.ajax({
            type: "POST",
            url: "/admin/getReport",
            data: data,
            success: function(datos){
                jQuery('#report').html(datos);
                jQuery(".order").on('click', orderChange)
            }
        });

    }

    function orderChange(){
        if(data['order']=='asc'){
            data['order'] = 'desc';
        }else{
            data['order'] = 'asc';
        }
        data['orderBy'] = jQuery(this).attr('field')
        makeReport();
    }

    var date = new Date();
    var range = '1950:'+date.getFullYear();

    var dateFormat = "mm/dd/yy",
        from = jQuery( ".dateFilter .dateFrom" )
        .datepicker({
            defaultDate: "-18y",
            changeYear: true,
            yearRange: range
        })
        .on( "change", function() {
            var date = getDate( this );
            if(data['filters'][jQuery(this).attr('name')] === undefined){
                data['filters'][jQuery(this).attr('name')] = {'from' : '', 'to' : ''}
            }
            data['filters'][jQuery(this).attr('name')]['from'] = date.getFullYear()+"/"+(date.getMonth()+1)+"/"+date.getDate();
            to.datepicker( "option", "minDate", getDate( this ) );
        }),
        to = $( ".dateFilter .dateTo" ).datepicker({
            defaultDate: "-18y",
            changeYear: true,
            yearRange: range
        })
        .on( "change", function() {
            var date = getDate( this );
            if(data['filters'][jQuery(this).attr('name')] === undefined){
                data['filters'][jQuery(this).attr('name')] = {'from' : '', 'to' : ''}
            }
            data['filters'][jQuery(this).attr('name')]['to'] = date.getFullYear()+"/"+(date.getMonth()+1)+"/"+date.getDate();
            from.datepicker( "option", "maxDate", getDate( this ) );
        });

    function getDate( element ) {
        var date;
        try {
            date = jQuery.datepicker.parseDate( dateFormat, element.value );
        } catch( error ) {
            date = null;
        }
        return date;
    }
</script>
@endsection
