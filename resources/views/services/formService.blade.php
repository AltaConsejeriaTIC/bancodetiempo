@extends('layouts.app')

@section('content')
	
		@include('nav', array('type' => 1))	

			<section class='bannerService row'>
				<div class="container">	
					<article class='hidden-xs hidden-sm col-md-4'>	
						<div class='row'>		
							<div class='col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3'>
								<div class="col-xs-12 col-sm-12">
									@include('partial/imageProfile', array('cover' => Auth::user()->avatar, 'id' => Auth::user()->id, 'border' => '#0f6784', 'borderSize' => '3px'))				
								</div>				
							</div>	
						</div>			
						<div class="row">
							<div class='col-xs-6 col-xs-offset-3  col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3'>
								<h2 class='title3 text-center col-xs-12'>{{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>
							</div>
						</div>		
					</article>				
					<article class="col-xs-12 col-sm-12 col-md-4">		
						<div class='row'>
							<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-12 col-md-offset-0">
								<h2 class='not-padding title1 text-white col-xs-12 col-sm-12 col-md-12'>¡Bienvenido a nuestra comunidad!</h2>
							</div>				
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-12 col-md-offset-0">
								<p class="not-padding paragraph1 text-white col-xs-12 col-sm-12 col-md-12">Para empezar, cuéntanos qué quieres ofrecer, recuerda que puedes ofertar cualquier habilidad, servicio o destreza. Puedes editar y crear nuevas ofertas más adelante.</p>
							</div>
						</div>
					</article>
				</div>
			</section>

			<section  id='pass' class='not-padding-bottom'>
					<div class="container">
						<div class="col-xs-12 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4">
							@include('partial/pass',array('pass1','pass2','pass3'))					
						</div>
					</div>
			</section>
			 
			<section class='row not-overflow' id='service'>	
				<div class="container">	
					<div class='row'>
						<article class='visible-xs visible-sm col-xs-12'>	
							<div class='row'>		
								<div class='col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-4'>
									<div class="not-padding col-xs-12 col-sm-12">
										@include('partial/imageProfile', array('cover' => Auth::user()->avatar, 'id' => Auth::user()->id))										
									</div>				
								</div>	
							</div>			
							<div class="row">
								<div class='not-padding col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3'>
									<h2 class='title1 text-center col-xs-12 col-sm-12'>{{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>
								</div>
							</div>		
						</article>	
						
						<article class='hidden-xs hidden-sm col-md-4 relative not-padding'>			
							<div class='relative scrollFixed'>
								<div class='relative col-md-12 not-padding'>
									<div class='service-box'>		 
										<span class='category' id='serviceCategory'></span>
										<div class="cover">								 
											<img src='/images/banner4.jpg' id='imageCover' alt="" />
										</div>
										<div class='avatar'>
											<avatar :cover='myData.cover'>                	
		                		<template scope="props">
		                			@include('partial/imageProfile', array('cover' => Auth::user()->avatar, 'id' =>Auth::user()->id, 'border' => '#fff', 'borderSize' => '3px', 'extra' => array('image' => ':xlink:href=props.cover')))
		                  		</template>                  	
		                  </avatar>
		                </div>
		                <div class="content">
											<h3 class='title title2' id='serviceName'></h3>
											<div class='ranking'>											
												<div>											
													@for($cont = 1 ; $cont <= 5 ; $cont++)												
														@if($cont <= Auth::user()->ranking)
															<span class='material-icons paragraph8'>grade</span>
														@else
															<span class='material-icons paragraph8 star'>fiber_manual_record</span>
														@endif												
													@endfor												
												</div>		
											</div>
											<div class="space15">										
											</div>											
											<p class='paragraph2' id='servicesDescription'></p>
											<div class='col-xs-12  col-sm-12'>										
												<span v-for="tag in myData.tagsUser" class="col-xs-6 input-tag button7 tag-margin">
										      <span>@{{ tag }}</span>								      
										    </span>
											</div>
										</div>
									</div>		
								</div>	
							</div>						
						</article>

						<article class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0">	
							<div class="col-xs-12  not-padding ">					
								<h1 class="title1 text-centernot-margin-top">¿Qué&nbsp;deseas&nbsp;ofrecer?</h1>
					        </div>
			      	
			      	        <div class='space'></div>
                            {!! Form::open(['url' => '/service/save', 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'form', 'class' => 'form-custom col-xs-12 col-sm-12', 'form-validation' => '']) !!}
                                <div class='serviceForm'>
                                    <div class="row col-sm-12">
                                        <div class="row">
                                            <label for="serviceName" class="paragraph10">Nombre de la oferta (Max. 50 caracteres)</label>
                                        </div>
                                        <div class="row">
                                            <input type="text" name="serviceName" autofocus placeholder="Ej. Clase de Inglés, Asesoría penal…" class="col-xs-12 col-sm-12 col-md-12 validation"    maxlength="50" data-validations='["required", "min:3", "max:50"]' onKeyUp='jQuery("#serviceName").html(jQuery(this).val())'>
                                            <i for='serviceName'></i>
                                            <div class="msg" errors='serviceName'>
                                                <p error='required'>Este campo es obligatorio.</p>
                                                <p error='min'>Este campo debe ser mínimo de 3 caracteres.</p>
                                                <p error='max'>Este campo debe ser máximo de 50 caracteres.</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="descriptionService" class="paragraph10">Descripción de la oferta</label>
                                        </div>
                                        <div class="row">
                                            <textarea class="countCharacters col-xs-12 col-sm-12 col-md-12 validation" rows="8" name="descriptionService" id='descriptionService' placeholder="Ej. Ofrezco una hora de una clase de Yoga para principiantes. Podemos acordar un lugar de encuentro cercano al campus de Universidad Nacional. Puedo realizar la sesión los lunes o los miércoles de 6:00 am a 7:00 pm."  data-validations='["required", "min:50", "max:250"]'  onKeyUp='jQuery("#servicesDescription").html(jQuery(this).val())'></textarea>
                                            <div class="msg" errors='descriptionService'>
                                                <p error='required'>Este campo es obligatorio.</p>
                                                <p error='min'>Este campo debe ser mínimo de 50 caracteres.</p>
                                                <p error='max'>Este campo debe ser máximo de 250 caracteres.</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="paragraph10">Modalidad</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 not-padding ">
                                                <input type="checkbox" name="modalityServiceVirtually" value="1" id="modalityServiceVirtually" class="square validation" data-validations='["requiredIfNot:modalityServicePresently"]'>
                                                <label for="modalityServiceVirtually">Virtual</label>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 not-padding ">
                                                <input type="checkbox" name="modalityServicePresently" value="1" id="modalityServicePresently" class="square validation" data-validations='["requiredIfNot:modalityServiceVirtually"]'>
                                                <label for="modalityServicePresently">Presencial</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="msg" errors='modalityServicePresently' >
                                                <p error='requiredIfNot'>Debes seleccionar una opción.</p>
                                            </div>
                                            <div class="msg" errors='modalityServiceVirtually' >
                                                <p error='requiredIfNot'>Debes seleccionar una opción.</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="paragraph10">Valor del servicio</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6">
                                                <input type="radio" name="valueService" value="1" id="time1" class="circle validation" data-validations='["requiredRadio"]'>
                                                <label for="time1">1 Hora</label>
                                            </div>
                                            <div class="col-xs-6 col-sm-6">
                                                <input type="radio" name="valueService" value="2" id="time2" class="circle validation" data-validations='["requiredRadio"]'>
                                                <label for="time2">2 Horas</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6">
                                                <input type="radio" name="valueService" value="3" id="time3" class="circle validation" data-validations='["requiredRadio"]'>
                                                <label for="time3">3 Horas</label>
                                            </div>
                                            <div class="col-xs-6 col-sm-6">
                                                <input type="radio" name="valueService" value="4" id="time4" class="circle validation" data-validations='["requiredRadio"]'>
                                                <label for="time4">4 Horas</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="msg" errors='valueService'>
                                                <p error='required'>Debes seleccionar el valor de tu servicio.</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="categoryService" class="paragraph10">Categoría</label>
                                        </div>
                                        <div class="row">
                                            <select name='categoryService' class='col-xs-12  col-sm-12 validation categories' data-validations='["required"]' onChange='jQuery("#serviceCategory").html(jQuery(this).children("option:checked").text())'>
                                            </select>
                                            <div class="msg" errors='categoryService'>
                                                <p error='required'>Debes seleccionar una categoría.</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="tagService" class="paragraph10">Palabras clave</label><span class="text-opacity"> (Opcional)</span>
                                        </div>
                                        <div class="row">
                                            <input-tag class="col-xs-12  col-sm-12 no-input" placeholder="Ej. EstiloDeVida JuegosDeMesa Collar" validate="text"></input-tag>
                                        </div>
                                        <div class="row">
                                            <label for="imageServices" class="paragraph10">Foto de la oferta</label><span class="text-opacity"> (Opcional)</span>
                                        </div>
                                        <div class="row">
                                            <input type="file" name="imageService" class="boxPhoto1 col-xs-12 col-sm-12 col-md-12 validation preview" id='imageService' data-mirror='#imageCover' data-validations='["maxFile:2500000"]'>
                                           <label for="imageService" class='text-center col-xs-12 col-sm-12'><span>Sube una foto</span></label>
                                           <div class="msg" errors='imageService'>
                                                <p error='max'>El peso màximo de la imagen debe ser de 3 Megas.</p>
                                            </div>
                                        </div>
                                        <div class='space'></div>
                                        <div class="row">
                                            <a href='/' class="col-xs-12  col-sm-12 button1 background-white text-center link1" >
                                            Saltar este paso
                                            </a>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <button type="submit" class="col-xs-12  col-sm-12 button1 background-active-color" >
                                            Publicar oferta
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
						</article>	
					</div>		
				</div>
			</section>		
			
@endsection
