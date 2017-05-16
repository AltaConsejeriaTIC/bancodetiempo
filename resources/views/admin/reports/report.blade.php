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
                                <input type="checkbox" value="{{$field->id}}" name="fields[]" class="square" id='field{{$field->id}}'>
                                <label for="field{{$field->id}}">{{$field->name}}</label>
                            </li>

                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <button type="button" id="generate">Generar</button>
                </div>
            </div>

        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    var data = {'_token' : '{{ csrf_token() }}', 'fields' : {}}
    jQuery(document).ready(function(){
        jQuery(".fieldReport > li > input").on('change', setFields);
        jQuery("#generate").on('click', makeReport)
    })

    function setFields(){
        if(jQuery(this).is(':checked')){
            data['fields'][jQuery(this).val()] = jQuery(this).val();
        }else{
            delete data['fields'][jQuery(this).val()];
        }
    }

    function makeReport(){

        jQuery.ajax({
            type: "GET",
            url: "/admin/makeReport",
            data: data,
            success: function(datos){
                jQuery('#report').html(datos);
            }
        });

    }
</script>
@endsection
