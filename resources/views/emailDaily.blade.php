@extends('emails.partial.layout')
    @section('title')
        <h3>Hola {{$receptor["user"]->first_name}}!</h3>
        <br>
        <h3>Tienes <strong>{{$receptor["messages"]->count()}}</strong> nuevos mensajes en la plataforma</h3>
    @endsection
    @section('content')
        @foreach($receptor["messages"] as $index => $message)
           @if($index > 5)
               @break
           @endif
            <div style='width: 10%;float: left;margin-right: 5%;'>
                <img src="{{url('/')}}/{{$message['sender']->avatar}}" alt="" style="width:100%">
            </div>
            <div style='background: #bbd9ea;
                        margin-bottom: 15px;
                        text-align: center;
                        padding: 15px;
                        float: left;
                        clear: right;
                        width: 75%;'>
                {{$message['message']}}
            </div>
        @endforeach        
    @endsection
    @section('action')
        <a href='http://cambalachea.co' align='center' style='background:#2cba36;display:block;width:50%;margin-left:15%;padding:15px;border-radius:4px;color:#fff;font-weight: bold;text-decoration: none;    position: relative; margin: auto;'>Ingresa para más Información</a>
    @endsection