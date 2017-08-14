<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

<div style="width:1024px;position:relative;margin:auto;font-family:'Open Sans', sans-serif;">
	<header style='background:url("http://cambalachea.co/images/banner/back1.jpg");position: relative;background-size: 100%;padding: 0px 50px;'>
		<img src="http://cambalachea.co/images/logo.png" alt="logo cambalachea" style='width: 25%; display: inline-block; padding:10px 20px;background:rgba(255, 255, 255, 0.5);'/>
		<h4 style="display: inline-block;color: #fff;float: right;font-size: 15px;margin: 25px;">Comunicaciones</h4>
	</header>
	<section style='width:90%;position:relative;margin:auto;'>
		<article style='width:70%;position:relative;margin:auto;'>
			 @yield('title')
		</article>
		<article style='width:90%;position:relative;margin:auto;background:#e9e9e9;border-radius:5px;padding: 25px;'>
			@yield('content')
		</article>
	</section>
	<footer>
		<p style='font-size:12px;text-align:center;color:#606074;'>Este mensaje es generado automáticamente, por favor no respondas a éste correo.<br>Si tienes preguntas, inquietudes o sugerencias, escríbenos al correo: info@cambalachea.co.</p>
	</footer>
</div>