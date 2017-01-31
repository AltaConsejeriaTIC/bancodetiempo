<script>

 export default {
     bind:function (el, b, vnode){     	     
     	var it = {
     		parent : vnode.context.$root,
     		validation : 0,
     		validationMsg : [],
     		value : b.value,
     		year : b.value.split("-")[0],
     		mounth : b.value.split("-")[1],
     		day : b.value.split("-")[2],
     		expr : new RegExp('^[0-9]{2,4}-[0-9]{1,2}-[0-9]{1,2}$'),
     		init_date:function(){
     			console.log()
				el.classList.add("validation")
				var day = '<select name="day" class="col-xs-3"><option value="">Dia</option>';
				for(var d = 1 ; d <= 31;d++){
					var check = '';
					if(it.day==d){check='selected'}
					day += '<option value="'+d+'" '+check+'>'+d+'</option>';
				}
				day += '</select> &nbsp;';
				el.innerHTML += day;
				
				var mounth = '<select name="mounth" class="col-xs-4"><option value="">Mes</option>';
				for(var m = 1 ; m <= 12;m++){
					var check = '';
					if(it.mounth==m){check='selected'}
					mounth += '<option value="'+m+'" '+check+'>'+m+'</option>';
				}
				mounth += '</select> &nbsp;';
				el.innerHTML += mounth;
				
				var date = new Date();
				var yearC = date.getFullYear();
				var year = '<select name="year" class="col-xs-4"><option value="">Año</option>';
				for(var y = (yearC-100) ; y <= yearC;y++){
					var check = '';
					if(it.year==y){check='selected'}
					year += '<option value="'+y+'" '+check+'>'+y+'</option>';
				}
				year += '</select> &nbsp;';
				el.innerHTML += year;
				
				
				el.innerHTML += '<p class="msg hidden"></p>';
			},
			addEvent:function(event){
				el.children[0].addEventListener(event, function () {
					vnode.context['day'] = el.children[0].value;
					it.value = el.children[2].value+"-"+el.children[1].value+"-"+el.children[0].value;
					it.validate();
					it.sendResponse();
				})
				el.children[1].addEventListener(event, function () {
					it.value = el.children[2].value+"-"+el.children[1].value+"-"+el.children[0].value;
					vnode.context['mounth'] = el.children[1].value;
					it.validate();
					it.sendResponse();
				})
				el.children[2].addEventListener(event, function () {
					it.value = el.children[2].value+"-"+el.children[1].value+"-"+el.children[0].value;
					vnode.context["year"] = el.children[2].value;
					it.validate();
					it.sendResponse();
				})
			},
			validate: function(){
			 	var f; 
			 	var param = '';			 	
			 	it.validation = 0;
			 	it.validationMsg = [];
			 	var validations = Object.keys(b.modifiers)
			 	
			 	for(var v in validations){
			 		f = validations[v].split(":")
			 		if(f.length == 2){
			 			param = f[1];
			 		} 		
			 		eval('it.'+f[0]+'('+param+')')
			 	}
			 
			},
			required : function (){				
			 	if(!it.expr.test(it.value)){
			 		it.validation += 1;
			 		it.validationMsg.push("Debes seleccionar un día, mes y año para "+el.dataset.name+".");
			 	}
 			}, 
			min : function (min){
				var hoy = new Date() 
				if(el.children[2].value >= hoy.getFullYear()-min){
					if(el.children[2].value == hoy.getFullYear()-min && el.children[1].value >= hoy.getMonth()+1){
						
						if(el.children[1].value == hoy.getMonth()+1){							
							
							if(el.children[0].value > hoy.getUTCDate()){
								it.validation += 1;
						 		it.validationMsg.push("Debes ser mayor de edad para registrarte en Cambalachea.");
							}
							
						}else{
							it.validation += 1;
					 		it.validationMsg.push("Debes ser mayor de edad para registrarte en Cambalachea.");
						}
					}else{
						it.validation += 1;
				 		it.validationMsg.push("Debes ser mayor de edad para registrarte en Cambalachea.");
					}
				}
			}, 
			max : function (max){
			 	if(it.value.length > max){
			 		it.validation += 1;
			 		it.validationMsg.push("Este campo debe ser máximo de "+max+" caracteres.");
			 	}
			},
			sendResponse : function (){
			 	el.children[3].innerHTML = "";
			 	el.children[3].classList.add("hidden") 			 	
			 	if(it.validation > 0){
			 		
			 		el.setAttribute('validation', 'false')
			 		el.children[0].classList.add("error")
			 		el.children[1].classList.add("error")
			 		el.children[2].classList.add("error")
			 		el.children[3].classList.remove("hidden") 			 		
			 		for(var msg in it.validationMsg){
			 			el.children[3].innerHTML += it.validationMsg[msg]+"<br>"
			 		}			 		
			 	}else{
			 		el.setAttribute('validation', 'true')
			 		
			 		el.children[0].classList.remove("error")
			 		el.children[1].classList.remove("error")
			 		el.children[2].classList.remove("error")
			 		
			 	}
			 	it.parent.validation()
			}			
		}
			 	
		eval('it.init_'+b.arg+'()');
		it.addEvent('change');
		it.validate();
		it.sendResponse();
		  
     }
 }

 
 
 </script>
			