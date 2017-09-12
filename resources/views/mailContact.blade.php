@extends('emails.partial.layout')
    @section('title')
        <h3>Hola  {{$service->user->first_name}}!</h3>
        <br>
        <h3>{{Auth::user()->first_name}} está @if($service->user->gender == 'male') interesado @elseif($service->user->gender == 'female') interesada @else interesadx @endif en tu oferta {{$service->name}}</h3>
    @endsection
    @section('content')
        
        <div style='width: 10%;float: left;margin-right: 5%;'>
            <img src="{{url('/')}}/{{Auth::user()->avatar}}" alt="" style="width:100%">
        </div>
        <div style='background: #bbd9ea;
                    margin-bottom: 15px;
                    text-align: center;
                    padding: 15px;
                    float: left;
                    clear: right;
                    width: 75%;'>
                    {!!$content!!}
        </div>      
    @endsection
    @section('action')
        <a href='{{url("/")}}/inbox' align='center' style='background:#2cba36;display:block;width:50%;margin-left:15%;padding:15px;border-radius:4px;color:#fff;font-weight: bold;text-decoration: none;    position: relative; margin: auto;'>Entra para responder</a>
    @endsection
