<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

<div style="width:512px;position:relative;margin:auto">
    <header style='background:url("http://cambalachea.co/images/banner.png");position: relative;background-size: 100%;'>
        <img src="http://cambalachea.co/images/logo.png" alt="logo cambalachea"  style='width: 35%; display: inline-block; margin: 20px 20% 20px 20px;background-color:rgba(250,250,250,0.7);padding:10px;border-radius:5px	'/>
        <h4 style="display: inline-block;color: #fff;float: right;font-size: 15px;margin: 25px;">Comunicaciones</h4>
    </header>
    <section style='width:90%;position:relative;margin:auto;'>
        <article>
            <h3 style='color:#4e4d61;font-family: "Open Sans", sans-serif;'>Hola {{$participant->first_name}}</h3>
            <p style='color:#000;font-family: "Open Sans", sans-serif;'>La buena onda de nuestros cambalacheros superó
                los límites de inscripción para la campaña {{$campaign->name}}. <strong>Por esta vez no
                    pudimos encontrar un cupo para ti pero esperamos contar con tu tiempo y tus habilidades en una próxima
                    ocasión.</strong> ¡Muchas gracias por querer marcar la diferencia!.</p>
        </article>
        <hr style='display:block;width:100%;border:none;height:30px;'>
        <article>
            <p style='color:#767676;font-size:12px;font-family: "Open Sans", sans-serif;'>
                Datos de contacto<br>
                Dirección: Vivelab Bogotá Carrera 45 No. 26 - 33 <br>
                Email: info@cambalachea.co<br>
            </p>

            <p style='color:#767676;font-size:12px;font-family: "Open Sans", sans-serif;'>Si tienes alguna pergunta,
                inquietud o sugerencia, escríbenos al correo: info@cambalachea.co</p>
        </article>
    </section>
</div>