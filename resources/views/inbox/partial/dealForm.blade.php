<article class="dealBox row hidden" id='dealBox'>
    <div class="col-xs-12">
        <div class="deal row" id='deal' canvas>
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1">
                        <p><strong>Que no se te pase concretar tu Cambalache haciendo clic en el siguiente botón. Es el único  medio para recibir o entregar tus dorados.</strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <button type="button" class="button1 background-active-color buttonTransition" data-open='#dealForm'>Proponer Cambalache</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="dealForm row" id='dealForm' canvas>
            <div class="loadBox"></div>
            <div class="col-xs-12">
                <form action="#" class="newDeal form-custom" method="get">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1 class="title1">Propuesta de Cambalache</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <label for="">Fecha y hora de realización del acuerdo</label><br>
                            <input type="text" name="date" placeholder='06/08/2017  9:45 AM' class="col-xs-12" id='dateDeal'>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <label for="">Lugar</label><br>
                            <input type="hidden" name="coordinates" id='coordinates'>
                            <input type="text" name="place" id='place' placeholder="Plazoleta Chorro de Quevedo" class="col-xs-12"><br>
                            <div id="map_canvas" class="map"></div>
                            <a href=""><i class="fa fa-map-marker" aria-hidden="true"></i> Ver listado de sitios sugeridos</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <label for="">Recomendaciones adicionales</label><br>
                            <textarea name="observations" class='col-xs-12' rows="6" placeholder="Si aún te falta cuadrar algún detalle de tu Cambalache, ¡escríbelo aquí! "></textarea>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="space15"></div>
                            <div class="space15"></div>
                            <div class="boxTimeDeal">
                                <p class="col-xs-12">
                                    <span class="text1">Tiempo de duración de la actividad que estás ofertando</span><br>
                                    <span class="text2">Recuerda que una (1) hora equivale a un (1) dorado.</span>
                                </p>
                                <div class="col-xs-3 not-padding-right">
                                    <input type="radio" value="1" name="credits" class="circle" id='timeDeal1' onClick='jQuery("#valueCredits").text(jQuery(this).val())'><label for="timeDeal1">1 hora</label><br>
                                    <input type="radio" value="3" name="credits" class="circle" id='timeDeal3' onClick='jQuery("#valueCredits").text(jQuery(this).val())'><label for="timeDeal3">3 hora</label>
                                </div>
                                <div class="col-xs-3 not-padding-right">
                                    <input type="radio" value="2" name="credits" class="circle" id='timeDeal2' onClick='jQuery("#valueCredits").text(jQuery(this).val())'><label for="timeDeal2">2 hora</label><br>
                                    <input type="radio" value="4" name="credits" class="circle" id='timeDeal4' onClick='jQuery("#valueCredits").text(jQuery(this).val())'><label for="timeDeal4">4 hora</label>
                                </div>
                                <div class="col-xs-6">
                                    <p class='text3'>Tu oferta costará</p>
                                    <p class='paragraph4'><img src="/images/moneda.png" alt="moneda" width="20px"> <span class="text4"><span id="valueCredits">0</span> Dorados</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-12 col-md-5 col-md-offset-1">
                           {{ csrf_field() }}
                            <button type="submit" class="col-xs-10 col-xs-offset-2 col-md-12 col-md-offset-1 button1 background-active-color">¡Proponer Cambalache!</button>
                        </div>
                        <div class="col-md-5 hidden-xs">
                            <button type="button" class="col-xs-12 button4 backgropund-white buttonTransition" data-open='#deal'>Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="dealDetail row" canvas id='dealDetail'>
            <div class="col-xs-10 col-xs-offset-1">
                <div class="row">
                    <h1 class="title1 text-center" id="dealMessage"></h1>
                </div>
                <div class="row">
                    <p class="paragraph1 text-center" id="dealSubMessage"></p>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <p><strong>Oferta: </strong><span id='dealNameService'></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <p><strong>Fecha del evento: </strong><span id='dealDate'></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <p><strong>Lugar: </strong><span id='dealPlace'></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <p><strong>Dorados: </strong> <img src="http://localbancodetiempo.com/images/moneda.png" style="width: 15px;">&nbsp;&nbsp;<span id='dealCredits'></span> Dorados</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <p><strong>Información adicional: </strong><span id='dealObservations'></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div id="dealMap"></div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-12 hidden buttonAction" id='buttonCancelDeal'>
                        <form action="#" class="cancelDeal form-custom" method="post">
                            {{ csrf_field() }}
                            <button type="submit" class="button4 background-white col-xs-6 col-xs-offset-3">Cancelar Cambalache</button>
                        </form>
                    </div>
                    <div class="col-xs-12 hidden buttonAction" id='buttonControlsDeal'>
                        <form action="#" class="aceptDeal form-custom" method="post">
                            {{ csrf_field() }}
                            <button type="submit" class="button4 text-white background-active-color col-xs-5">Aceptar Cambalache</button>
                        </form>
                        <form action="#" class="cancelDeal form-custom" method="post">
                            {{ csrf_field() }}
                            <button type="submit" class="button4 background-white col-xs-5 col-xs-offset-2">Declinar Cambalache</button>
                        </form>
                    </div>
                    <div class="col-xs-12 hidden buttonAction" id='buttonNewDeal'>
                        <button type="button" class="button1 background-active-color col-xs-8 col-xs-offset-2 buttonTransition" data-open='#dealForm'>¡Proponer Nuevo Cambalache!</button>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <div id="dealScore" class="row" canvas>
            <div class="col-xs-10 col-xs-offset-1">
                <div class="row">
                    <h1 class="title1 text-center" id="dealScoreMessage"></h1>
                </div>
                <div class="row">
                    <p class="col-xs-12 paragraph4">Déjanos saber cómo fue tu experiencia para realizar la asignación de Dorados. </p>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <p class="paragraph4">¿Se realizó el Cambalache?</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-center" id='controlsObservations'>
                        <button type="button" @click='myData.observations = true' class='button1 text-center paragraph4 text-white background-active-color' >Si </button>
                        <button type="button" @click='myData.badObservations = true' class='button1 paragraph4 text-center background-white' >No</button>
                    </div>
                </div>
            
            </div>
            <div class="space"></div>
        </div>
        
        <div id="dealFinish" class="row" canvas>
            <div class="col-xs-10 col-xs-offset-1">
                <div class="row">
                    <h1 class="title1 text-center" id="dealFinishTitle"></h1>
                </div>
                <div class="row">
                    <p class="col-xs-12 paragraph4" id='dealUserObservation'></p>
                </div>
                <div class="row">
                    <div class="col-xs-12 hidden buttonAction" id='buttonNewDeal'>
                        <button type="button" class="button1 background-active-color col-xs-8 col-xs-offset-2 buttonTransition" data-open='#dealForm'>¡Proponer Nuevo Cambalache!</button>
                    </div>
                </div>
            
            </div>
        </div>
        
    </div>
</article>
<input type="hidden" id='meId' value="{{Auth::id()}}">

@include("inbox.partial.observationForm")