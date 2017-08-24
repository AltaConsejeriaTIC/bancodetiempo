@extends('emails.partial.layout')
    @section('title')
        <h3>Hola  {{$participant->first_name}}!</h3>
        <br>
        <h3>La campaña {{$campaign->name}} superó los limites de inscrpción</h3>
    @endsection
    @section('content')
        
        <div style='background: #bbd9ea;
                    margin-bottom: 15px;
                    text-align: center;
                    padding: 15px;
                    margin:auto;
                    width: 50%;'>
            La buena onda de nuestros cambalacheros superó los límites de inscripción para la campaña {{$campaign->name}}. <strong>Por esta vez no pudimos encontrar un cupo para ti pero esperamos contar con tu tiempo y tus habilidades en una próxima ocasión.</strong> ¡Muchas gracias por querer marcar la diferencia!.
        </div>        
    @endsection
    @section('action')
        <a href='http://cambalachea.co/campaign/{{$campaign->id}}' align='center' style='background:#2cba36;display:block;width:50%;margin-left:15%;padding:15px;border-radius:4px;color:#fff;font-weight: bold;text-decoration: none;    position: relative; margin: auto;'>Ingresa para más Información</a>
    @endsection