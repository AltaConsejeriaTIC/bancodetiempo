<div class='box-modal' id='form-observation'>
    <div class='shadow'></div>
    <div class='panel box-fixed col-md-4 col-md-offset-4'>
       {!! Form::open(['url' => '/addObservation', 'method' => 'post', 'class' => 'form-custom', 'form-validation' => '']) !!}
            <div class="content">
                <div class="row">
                    <h1 class="title1 col-md-10 col-md-offset-1">¡Califica tu experiencia!</h1>
                </div>
                <div class="row">
                    <p class="paragraph4 col-md-12 text-center">Oferta: {{$conversation->service->name}}</p>
                </div>
                <div class="row">
                    @if($conversation->service->user->id == Auth::User()->id)
                        <h3 class="title2 col-md-12">Valora a {{$conversation->applicant->first_name}}</h3>
                    @elseif($conversation->applicant_id == Auth::User()->id)
                        <h3 class="title2 col-md-12">Valora a {{$conversation->service->user->first_name}}</h3>
                    @endif
                </div>
                <div class="row">
                    <p class="paragraph4 col-md-12">Amabilidad, respeto y confianza</p>
                </div>
                <div class="row">
                   <div class="col-md-12">
                        <input type="hidden" name='score' id='score' class='stars validation' data-validations='["required"]'>
                        <label for="score">
                            <i score='1' class='star1 score' input='score'></i>
                            <i score='2' class='star2 score' input='score'></i>
                            <i score='3' class='star3 score' input='score'></i>
                            <i score='4' class='star4 score' input='score'></i>
                            <i score='5' class='star5 score' input='score'></i>
                        </label>
                   </div>

                </div>
                @if($conversation->service->user->id != Auth::User()->id)
                    <div class="row">
                        <p class="paragraph4 col-md-12">Calidad del servicio</p>
                    </div>
                    <div class="row">
                       <div class="col-md-12">
                            <input type="hidden" name='scoreService' id='scoreService' class='stars validation' data-validations='["required"]'>
                            <label for="scoreService">
                                <i score='1' class='star1 score' input='scoreService'></i>
                                <i score='2' class='star2 score' input='scoreService'></i>
                                <i score='3' class='star3 score' input='scoreService'></i>
                                <i score='4' class='star4 score' input='scoreService'></i>
                                <i score='5' class='star5 score' input='scoreService'></i>
                            </label>
                       </div>

                    </div>
                @endif
                <div class="row">
                    <p class="paragraph4 col-md-12">Deja un comentario (Max. 250 caracteres)</p>
                </div>
                <div class="row">
                    <label class="paragraph4 col-md-12">¿Cómo te pareció la experiencia? ¿Qué fue lo que más te gustó? ¿Qué pudo haber sido mejor?.</label>
                </div>
                <div class="row">
                   <div class="col-md-12">
                       <textarea name="observation" class='validation' id="observation" cols="30" rows="10" placeholder="Ej. La calidad del servicio fue excelente, pasé un rato agradable y me divertí mucho aunque hubiera sido mejor comenzar con la actividad puntualmente." data-validations='["required", "min:10", "max:200"]'></textarea>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-12">
                     <input type="hidden" name='service_id' value='{{$conversation->service->id}}'>
                      <input type="hidden" name='offerer_id' value='{{$conversation->service->user->id}}'>
                      <input type="hidden" name='applicant_id' value='{{$conversation->applicant_id}}'>
                      <input type="hidden" name='response' value='1'>
                      <input type="hidden" name='deal_id' value=''>
                       @if($conversation->service->user->id == Auth::User()->id)
                          <input type="hidden" name="scoreFrom" value='offerer'>
                        @elseif($conversation->applicant_id == Auth::User()->id)
                          <input type="hidden" name="scoreFrom" value='applicant'>
                        @endif
                       <button type="submit" class='button1 background-active-color col-md-12'>Enviar</button>
                   </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                       <button type="button" class='button10 background-white col-md-12 hiddenModal' modal='form-observation'>Cancelar</button>
                   </div>
                </div>
                <br>

            </div>
        {!!Form::close()!!}
    </div>
</div>


<div class='box-modal' id='form-bad-observation'>
    <div class='shadow'></div>
    <div class='panel box-fixed col-md-4 col-md-offset-4'>
       {!! Form::open(['url' => '/addObservation', 'method' => 'post', 'class' => 'form-custom', 'form-validation' => '']) !!}
            <div class="content">
                <div class="row">
                    <h1 class="title1 col-md-10 col-md-offset-1">¿Qué salió mal?</h1>
                </div>
                <div class="row">
                    <p class="paragraph4 col-md-12 text-center">Oferta: {{$conversation->service->name}}</p>
                </div>
                <div class="row">
                    <p class="paragraph4 text-center text-red col-md-12">Elije el motivo por el cuál no se realizó el acuerdo.</p>
                </div>
                @foreach(App\Models\BadObservation::where('id', '!=', 1)->get() as $observation)
                    <div class="row">
                        <div class="col-md-12">
                            <input type="radio" value='{{$observation->id}}' name='badObservation' class='square' id='observation{{$observation->id}}'>
                            <label for="observation{{$observation->id}}">{{$observation->observation}}</label>
                        </div>
                    </div>
                @endforeach


                <div class="row">
                   <div class="col-md-12">
                     <input type="hidden" name='service_id' value='{{$conversation->service->id}}'>
                      <input type="hidden" name='offerer_id' value='{{$conversation->service->user->id}}'>
                      <input type="hidden" name='applicant_id' value='{{$conversation->applicant_id}}'>
                      <input type="hidden" name='response' value='0'>
                      <input type="hidden" name='deal_id' value=''>
                       @if($conversation->service->user->id == Auth::User()->id)
                          <input type="hidden" name="scoreFrom" value='offerer'>
                        @elseif($conversation->applicant_id == Auth::User()->id)
                          <input type="hidden" name="scoreFrom" value='applicant'>
                        @endif
                       <button type="submit" class='button1 background-active-color col-md-12'>Enviar</button>
                   </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                       <button type="button" class='button10 background-white col-md-12 hiddenModal' modal='form-bad-observation'>Cancelar</button>
                   </div>
                </div>
                <br>

            </div>
        {!!Form::close()!!}
    </div>
</div>
