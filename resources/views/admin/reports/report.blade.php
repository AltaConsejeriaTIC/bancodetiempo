@extends('layouts.appAdmin')

@section('content')

<div class="container" id="app">
    <div class="panel panel-default relative">

        <div class="row">

            <div class="col-xs-12">
                <h1 class="title2">{{$report->name}}</h1>
            </div>

        </div>
        <hr>
        <article id='report'>



        </article>

        <div id="fiels">

            <div class="row">
                <div class="col-xs-12">
                    <h3 class="title2">
                        Campos disponibles
                    </h3>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <ul class="form-custom fieldReport">
                        @foreach($fields as $field)

                            <li>
                                <input type="checkbox" value="{{$field->name}}" name="fields[]" class="square" id='field{{$field->id}}' field='{{$field->name}}'>
                                <label for="field{{$field->id}}">{{$field->name}} @if($field->type != '')<button type="button" class="material-icons icon" @click='myData.filter{{$field->name}} = true'>visibility</button>@endif</label>
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
        'fields' : [],
        'order' : 'asc',
        'orderBy' : '',
        'filters' : {}
    }
    jQuery(document).ready(start)

    function start(){
        jQuery(".fieldReport > li > input").on('change', setFields);
        jQuery(".generate").on('click', makeReport)
        jQuery("#fiels").draggable({ cursor: "crosshair" });
        jQuery(".order").on('click', orderChange);
        jQuery(".filter").on("change", addFilter);
        getDate();
    }

    function addFilter(){
        var index = jQuery(this).attr('name');
        var value = jQuery(this).val();
        i = index.split('.');

        if(i.length > 1){

            if(data['filters'][i[0]] === undefined){
                data['filters'][i[0]] = {'from' : '', 'to' : ''};
            }
            data['filters'][i[0]][i[1]] = value;

        }else{
           data['filters'][index] = value;
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

    function makeReport(){

        jQuery.ajax({
            type: "GET",
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
