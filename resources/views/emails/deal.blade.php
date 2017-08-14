@extends('emails.partial.layout')
    @section('title')
        <h3>Hola {{$Addressee->first_name}}!</h3>
        <br>
        
    @endsection
    @section('content')
        @if($action == 'new')
            <h3><strong>Tienes Nuevas Propuestas</strong></h3>
        @endif        
        @if($action == 'acepted')
            <h3><strong>Han aceptado tu propuesta</strong></h3>
        @endif
        <a href='http://cambalachea.co/inbox' align='center' style='background:#2cba36;display:block;width:60%;margin-left:15%;padding:15px;border-radius:4px;color:#fff;font-weight: bold;text-decoration: none;'>Ingresa para más Información</a>
    @endsection