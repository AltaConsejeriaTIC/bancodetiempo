@extends('emails.partial.layout')
    @section('title')
        <h3>Hola {{$user->first_name}}!</h3>
    @endsection
    @section('content')
       <h3>Tienes <strong>{{$notifications}}</strong> nuevos mensajes en la plataforma</h3>
        
    @endsection
    @section('action')
        <a href='http://cambalachea.co' align='center' style='background:#2cba36;display:block;width:50%;margin-left:15%;padding:15px;border-radius:4px;color:#fff;font-weight: bold;text-decoration: none;    position: relative; margin: auto;'>Ingresa para más Información</a>
    @endsection