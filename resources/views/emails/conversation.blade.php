@extends('emails.partial.layout')
    @section('title')
        <h3>Hola {{$addressee->first_name}}!</h3>
    @endsection
    @section('content')
        <h3><strong>{{$sender->first_name}}</strong> te ha respondido en la oferta <strong>{{$service->name}}</strong></h3>    
        
        <p style="background: #fff;padding: 10px;border-radius: 5px;border: 2px solid #86b8cb;">{{$msg}}</p>    
    @endsection
    @section('action')
        <a href='{{url("/")}}/inbox' align='center' style='background:#2cba36;display:block;width:50%;margin-left:15%;padding:15px;border-radius:4px;color:#fff;font-weight: bold;text-decoration: none;    position: relative; margin: auto;'>Ingresa para más Información</a>
    @endsection