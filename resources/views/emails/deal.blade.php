@extends('emails.partial.layout')
    @section('title')
        <h3>Hola {{$Addressee->first_name}}!</h3>
        <br>
         @if($action == 'ranking')
            <h3>¡Califica tu Cambalache: {{$service->name}} con {{$sender->first_name}}!</h3>
        @endif
    @endsection
    @section('content')
        @if($action == 'new')
            <h3><strong>Tienes Nuevas Propuestas</strong></h3>
        @endif        
        @if($action == 'acepted')
            <h3><strong>{{$sender->first_name}} ha aceptado tu propuesta</strong></h3>
        @endif
        @if($action == 'ranking')
            <h3><strong>Ingresa a la conversación con {{$sender->first_name}} y desde allí califica tu experiencia para realizar la asignación de dorados correspondiente</strong></h3>
        @endif
        
    @endsection
    @section('action')
        <a href='http://cambalachea.co' align='center' style='background:#2cba36;display:block;width:50%;margin-left:15%;padding:15px;border-radius:4px;color:#fff;font-weight: bold;text-decoration: none;    position: relative; margin: auto;'>Ingresa para más Información</a>
    @endsection