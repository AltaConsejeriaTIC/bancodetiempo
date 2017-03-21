<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

<div style="width:512px;position:relative;margin:auto">
	<header style='background:url("https://4.bp.blogspot.com/-JVXX4SbLbvg/WKIwFiYJ4hI/AAAAAAAACpc/Yw5S-SKDBW4qxVnRjtvA7ZLCCxW8rylhgCLcB/s1600/banner4.jpg");position: relative;background-size: 100%;'>
		<img src="https://1.bp.blogspot.com/-FJNz8vx0WnA/WKIwRlZ1xqI/AAAAAAAACpk/a9VEADixisUMyu2ErhyPryjJaHb6thsMACLcB/s1600/logo.png" alt="logo cambalachea" style='width: 35%; display: inline-block; margin: 20px 20% 20px 20px;	'/>
		<h4 style="display: inline-block;color: #fff;float: right;font-size: 15px;margin: 25px;">Comunicaciones</h4>
	</header>
	<section style='width:90%;position:relative;margin:auto;'>
		<article>
			<h3 style='color:#4e4d61;font-family: "Open Sans", sans-serif;'>{{$userauth->first_name}} está @if($service->user->gender == 'male') interesado @elseif($service->user->gender == 'female') interesada @else interesadx @endif en tu oferta:</h3>
			<div style='width:15%;float:left;'>
				<img src='{{$imageProfile}}' style='width:90%' alt='image'>
			</div>
			<div style='width:60%;margin-left:15px;float:left;'><h3 style='color:#4e4d61;font-family: "Open Sans", sans-serif;'>{{$service->name}}</h3></div>
		</article>		
		<hr style='display:block;width:100%;border:none;height:30px;'>
		<article>
			<div style='width:15%;float:right;'>
				<img src='{{$myImageProfile}}' style='width:90%' alt='image'>
			</div>
			<div style='width:60%;margin-right:15px;color:#fff;float:right;background:#0f6784;padding: 0px 15px;border-radius:4px;font-family: "Open Sans", sans-serif;'>
				<p>{{$content}}</p>
			</div>
			<hr style='display:block;width:100%;border:none;height:10px;'>
			<a href='http://cambalachea.co' align='center' style='background:#2cba36;display:block;width:60%;margin-left:15%;padding:15px;border-radius:4px;color:#fff;font-weight: bold;text-decoration: none;'>Entra para responder</a>
		</article>
		<article>
			<p style='color:#767676;font-size:12px;font-family: "Open Sans", sans-serif;'>
				Datos de contacto<br>
				Teléfono:  000 00 00<br>
				Dirección: Carrera 45 No. 26 - 33 <br>
				Email: contacto@cambalachea.co<br>
			</p>
			<a href="#" style='color:#0f6784;font-size:12px;font-family: "Open Sans", sans-serif;'>Cancelar suscripción</a>
			<p style='color:#767676;font-size:12px;font-family: "Open Sans", sans-serif;'>Por favor no respondas éste correo. La cuenta comunicacion@cambalachea.com distribuye las notificaciones al correo, no es una vía para resolver dudas. Si tienes alguna pergunta, inquietud o sugerencia, escríbenos al correo: ayuda@cambalachea.co.</p>
		</article>
	</section>
	
</div>
