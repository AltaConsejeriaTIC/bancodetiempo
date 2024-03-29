@extends('emails.partial.layout')
    @section('title')
        <h3>Hola  {{$participant->first_name}}!</h3>
        <br>
        <h3>La campaña {{$campaign->name}} ha sido bloqueada</h3>
    @endsection
    @section('content')
        
        <div style='background: #bbd9ea;
                    margin-bottom: 15px;
                    text-align: center;
                    padding: 15px;
                    margin:auto;
                    width: 50%;'>
            Gracias por tu interés en participar en la campaña: {{$campaign->name}}. Desafortunadamente esta <strong>ya no está disponible en nuestra plataforma.</strong> Pero no te desanimes, tenemos muchas campañas abiertas en las que puedes participar, conócelas haciendo clic <a href="http://cambalachea.co/home#campaigns">aquí</a>.
        </div>        
    @endsection
    @section('action')
        <a href='{{url("/")}}/home#campaigns' align='center' style='background:#2cba36;display:block;width:50%;margin-left:15%;padding:15px;border-radius:4px;color:#fff;font-weight: bold;text-decoration: none;    position: relative; margin: auto;'>Ingresa para más Información</a>
    @endsection
