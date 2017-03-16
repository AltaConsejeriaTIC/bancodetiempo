<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cambalachea</title>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style>
            html,
            body {
                width: 100%;
                height: 100%;
            }
            #content{
              color:white !important;
            }
            body {
                font-family: "Source Sans Pro","Helvetica Neue",Helvetica,Arial,sans-serif;
                background: black;
            }
            .img-center {
                position: relative;
                left: 17%;
                    max-width: 65%;
                top: -59px;
            }
            .text-vertical-center {
                display: table-cell;
                text-align: center;
                vertical-align: middle;
            }

            .list{
              color: white;
                background-color: rgba(0,0,0,0.7);
                height: 2000px;
                width: 90%;
                position: relative;
                left: 5%;
                border-radius: 10px;
            }
            .btn-dark {
                border-radius: 0;
                color: #fff;
                background-color: rgba(211, 205, 205, 0.4);
            }

            .btn-green {
                border-radius: 0;
                color: #fff;
                background-color: #2cba36;
            }

            .btn-dark:hover,
            .btn-dark:focus,
            .btn-dark:active {
                color: #fff;
                background-color: rgba(0,0,0,0.7);
            }

            .btn-light {
                border-radius: 0;
                color: #333;
                background-color: rgb(255,255,255);
            }

            .btn-light:hover,
            .btn-light:focus,
            .btn-light:active {
                color: #333;
                background-color: rgba(255,255,255,0.8);
            }
            #answer{
              font-family: "Source Sans Pro";
              color:white;
              border: none;
              color: #fff;
              font-style: 18pt;
              padding-top: 20px;
              background-color: transparent;
            }
            input:-webkit-autofill {
                -webkit-box-shadow: 0 0 0px 1000px black inset;
                -webkit-text-fill-color: white !important;
            }
            input{
              width:  20%;
            }
            .space{
              margin-bottom:26px !important;
            }
            .space1{
              margin-bottom:36px  !important;}
            .header {
                display: table;
                position: relative;
                width: 100%;
                height: 100%;
                background: url(/images/banner4.jpg) no-repeat center center scroll;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                background-size: cover;
                -o-background-size: cover;
            }
            h1{
              font-family: "Source Sans Pro";
              color:white;
              font-weight:bold;
              margin: 0px !important;
              left: 13%;
            }
            h3{
              font-family: "Source Sans Pro";
              color:white;
              font-weight: lighter;
              margin: 0px !important;
              left: 13%;
            }
            h4{
              font-family: "Source Sans Pro";
              font-weight: lighter;
              margin: 0px !important;
              left: 13%;
            }
            .msg {
                background: #fff;
                position: absolute;
                width: 50%;
                z-index: 100;
                top: 11%;
                left: 25%;
                padding: 2%;
                border-radius: 7px;
            }
            .row{
              margin-top: 1%;
             margin-right: 0px !important;
            }
            `br{
              margin-top: 15px;
            }

        </style>
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    </head>

    <body>
        @if(session('response'))
           <div class='msg'>
               <h4>Estamos creando algo que generará un alto impacto del que muy pronto harás parte.</h4>
               <p></p>
               <button type="button" onclick='jQuery(".msg").fadeOut()' class="btn btn-success">Cerrar</button>

           </div>

        @endif
        <!-- Header -->
        <header class="header">
            <div class="text-vertical-center">
                <img class=" col-xs-9 img-responsive img-center" src="/images/logo.png" alt="">
                <form  role="form" method="POST" action="{{ url('/subscribe') }}">
                    {{ csrf_field() }}

                    <h1 class=" col-xs-9 text-center">¿Para qué el dinero si puedes usar tu tiempo?</h1>
                    <h1 class=" col-xs-9 space1">Comparte lo que sabes, aprende lo que quieras.</h1>

                    <h3 class="col-xs-offset-1 col-xs-9 ">¿Quieres saber más? </h3>
                    <h3 class="col-xs-offset-1 col-xs-9 space ">Ingresa tu correo</h3>

                    <div class="row">
                        <input name="email" class="col-md-offset-4 col-xs-offset-2 col-md-4 col-xs-9 btn btn-dark btn-lg" value=''> </input>
                    </div>
                     <div class="row">
                        <button type="submit"  class="col-md-2 col-md-offset-5 col-xs-3 btn btn-green btn-lg col-xs-offset-5">Enviar
                        </button>
                        </form>
                   </div>
                </form>
            </div>
        </header>


    <script src="js/bootstrap.min.js"></script>
    </body>
</html>
