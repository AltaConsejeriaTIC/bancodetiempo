<div class="col-xs-12 col-sm-7 col-md-8 conversation">
    <div class="row">
        <div class="col-xs-12 visible-xs">
            <a href="#" class='closeConversation'>
                <i class="fa fa-arrow-left" style="color:#0f6784"></i>
            </a>
        </div>
    </div>
    <article class="dealBox row">
        <div class="col-xs-12" transition>
            <div class="deal active row" canvas data-in='right' data-out='left'>
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <button type="button" class="button1 background-active-color" transition-button data-open='.dealForm'>Proponer Cambalache</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dealForm row" canvas data-in='left' data-out='right'>
                <div class="col-xs-12">
                    {!! Form::open(['url' => '/deal', 'class' => 'form-custom']) !!}
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <h1 class="title1">Propuesta de Cambalache</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <label for="">Fecha y hora de realización del acuerdo</label><br>
                            <input type="text" name="date" placeholder='06/08/2017  9:45 AM' class="col-xs-12">
                        </div>
                        <div class="col-xs-6">
                            <label for="">Lugar</label><br>
                            <input type="text" name="place" placeholder="Plazoleta Chorro de Quevedo" class="col-xs-12"><br>
                            <a href=""><i class="fa fa-map-marker" aria-hidden="true"></i> Ver listado de sitios sugeridos</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <label for="">Recomendaciones adicionales</label><br>
                            <textarea name="observations" class='col-xs-12' rows="6" placeholder="Escribe la lista de materiales que se necesitan para la actividad en caso de ser necesario, también puedes brindar indicaciones para llegar al lugar del intercambio o escribir cualquier observación que consideres importante."></textarea>
                        </div>
                        <div class="col-xs-6">
                            <div class="space15"></div>
                            <div class="space15"></div>
                            <div class="boxTimeDeal">
                                <p class="col-xs-12">
                                    <span class="text1">Tiempo de duración de la actividad que estás ofertando</span><br>
                                    <span class="text2">Recuerda que una (1) hora equivale a un (1) dorado.</span>
                                </p>
                                <div class="col-xs-3 not-padding-right">
                                    <input type="radio" value="1" name="credits" class="circle" id='timeDeal1'><label for="timeDeal1">1 hora</label><br>
                                    <input type="radio" value="3" name="credits" class="circle" id='timeDeal3'><label for="timeDeal3">3 hora</label>
                                </div>
                                <div class="col-xs-3 not-padding-right">
                                    <input type="radio" value="2" name="credits" class="circle" id='timeDeal2'><label for="timeDeal2">2 hora</label><br>
                                    <input type="radio" value="4" name="credits" class="circle" id='timeDeal4'><label for="timeDeal4">4 hora</label>
                                </div>
                                <div class="col-xs-6">
                                    <p class='text3'>Tu oferta costará</p>
                                    <p class='paragraph4'><img src="/images/moneda.png" alt="moneda" width="20px"> <span class="text4">3 Dorados</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-5 col-xs-offset-1">
                            <button type="submit" class="col-xs-12 button1 background-active-color">¡Proponer Cambalache!</button>
                        </div>
                        <div class="col-xs-5">
                            <button type="button" class="col-xs-12 button4 backgropund-white">Cancelar</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </article>
    <div class="box">
    </div>
    <div class="controllers hidden">
        <div class="row">
            <form action="#" class="sendMenssages" method="get">
                <div class="col-xs-10">
                    <input name="message" id="message" class="col-xs-12" placeholder="Escribe tu mensaje aquí…">
                    <input type="hidden" id='conversationInput'>
                    <input type="hidden" id='senderInput' value="{{Auth::id()}}">
                    {{ csrf_field() }}
                </div>
                <div class="col-xs-2">
                    <button type="submit">
                       <i class="fa fa-send" style="color:#0f6784"></i>
                    </button>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>
