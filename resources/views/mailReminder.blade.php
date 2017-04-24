<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

<div style="width:512px;position:relative;margin:auto">
	<header style='background:url("http://cambalachea.co/images/banner.png");position: relative;background-size: 100%;'>
		<img src="http://cambalachea.co/images/logo.png" alt="logo cambalachea" style='width: 35%; display: inline-block; margin: 20px 20% 20px 20px;	'/>
		<h4 style="display: inline-block;color: #fff;float: right;font-size: 15px;margin: 25px;">Comunicaciones</h4>
	</header>
	<section style='width:90%;position:relative;margin:auto;'>
		<article>
			<h3 style='color:#4e4d61;font-family: "Open Sans", sans-serif;'>Tienes nueva Actividad pendiente:</h3>
		</article>
		<hr style='display:block;width:100%;border:none;height:30px;'>
		<article>
			<div style='width:90%;margin-left:15px;color:#fff;float:left;background:#0f6784;padding: 0px 15px;border-radius:4px;font-family: "Open Sans", sans-serif;'>
				<p style="color:#fff">
					Hola {{$user->first_name}}, recuerda que mañana tienes el evento {{$campaign->name}}
				</p>

			</div>
			<hr style='display:block;width:100%;border:none;height:20px;'>
		</article>
		<article>
			<p style='color:#767676;font-size:12px;font-family: "Open Sans", sans-serif;'>
				Datos de contacto<br>
				Dirección: Vivelab Bogotá Carrera 45 No. 26 - 33 <br>
				Email: evenvivelab_bog@unal.edu.co<br>
			</p>

			<p style='color:#767676;font-size:12px;font-family: "Open Sans", sans-serif;'>Si tienes alguna pergunta, inquietud o sugerencia, escríbenos al correo: evenvivelab_bog@unal.edu.co.</p>
		</article>
	</section>
</div>
