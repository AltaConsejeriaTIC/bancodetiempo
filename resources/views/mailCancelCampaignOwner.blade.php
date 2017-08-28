@extends('emails.partial.layout')
    @section('title')
        <h3>Hola  {{$participant->first_name}}!</h3>
        <br>
        <h3>TU campaña a sido bloqueada</h3>
    @endsection
    @section('content')
        
        <div style='background: #bbd9ea;
                    margin-bottom: 15px;
                    text-align: center;
                    padding: 15px;
                    margin:auto;
                    width: 50%;'>
            Lamentamos informarte que tu campaña {{$campaign->name}} <strong>no cumple con los <a href="http://cambalachea.co/content/terms">términos y condiciones</a> de la plataforma, por lo que tuvimos que deshabilitarla.</strong> Si tienes alguna duda escríbenos al correo <a href="mailto:info@cambalachea.co">info@cambalachea.co</a>
        </div>        
    @endsection
    @section('action')
        <a href='{{url("/")}}/' align='center' style='background:#2cba36;display:block;width:50%;margin-left:15%;padding:15px;border-radius:4px;color:#fff;font-weight: bold;text-decoration: none;    position: relative; margin: auto;'>Ingresa para más Información</a>
    @endsection