<script>

 export default {
     bind:function (el, b, vnode){    
    	 
    	 if(el.dataset.labeltext === undefined){ el.dataset.labeltext = "{}" }
     	var it = {
     		parent : vnode.context.$root,
     		labeltext: JSON.parse(el.dataset.labeltext),
     		options: JSON.parse(el.dataset.options),     		
     		validation : 0,
     		validationMsg : [],
     		value : b.value,
     		label: true,
     		expr: new RegExp('^[^ ][a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$'),
     		boxMsg : "",
			init_radio:function(){
				el.classList.add("validation")
				
				for(var o in it.options){
					var check = ""
					if(it.options[o]==it.value){check = 'checked'}
					el.innerHTML += '<input type="radio" name="'+el.dataset.name+'" class="'+el.dataset.inputclass+'" value="'+it.options[o]+'" id="'+o+'" '+check+'>';
					if(it.label){
						if(!(o in it.labeltext)){
							it.labeltext[o] = o 
						}
						el.innerHTML += '<label for="'+o+'">'+it.labeltext[o]+'</label>'
					}
					
				}
				el.innerHTML += '<p class="msg hidden"></p>';
				it.addEvent('click');
				it.boxMsg = el.getElementsByClassName('msg')
			},	
			init_checkbox:function(){
				el.classList.add("validation")
				
				for(var o in it.options){
					var check = ""
					if(it.options[o]==it.value){check = 'checked'}
					el.innerHTML += '<input type="checkbox" name="'+el.dataset.name+'" class="'+el.dataset.inputclass+'" value="'+it.options[o]+'" id="'+o+'" '+check+'>';
					
					if(it.label){
						if(!(o in it.labeltext)){
							it.labeltext[o] = o 
						}
						el.innerHTML += '<label for="'+o+'">'+it.labeltext[o]+'</label>'
					}
				}
				el.innerHTML += '<p class="msg hidden"></p>';
				it.addEvent('click');
				it.boxMsg = el.getElementsByClassName('msg')
			},
			init_select:function(){
				el.classList.add("validation")
				var select = '<select>'
				for(var o in it.options){
					var check = ""
					if(it.options[o]==it.value){check = 'checked'}
						
					select += '<option value="'+it.options[o]+'">'+it.options[o]+'</option>';
					
					
				}
				
				select += '</select>';
				el.innerHTML += select
				el.innerHTML += '<p class="msg hidden"></p>';
				it.addEvent('click');
				it.boxMsg = el.getElementsByClassName('msg')
			},
			addEvent:function(event){
				for(var e = 0 ; e < el.getElementsByTagName('input').length ; e++){
					
					el.getElementsByTagName('input')[e].addEventListener(event, function () {
						
						if(b.arg == 'checkbox'){
							vnode.context[b.expression] = this.checked;
							it.value = this.checked;
							it.validate();
							it.sendResponse();
						}else{
							vnode.context[b.expression] = this.value;
							it.value = this.value;
							it.validate();
							it.sendResponse();
						}
						
					})
				}
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
			 	if(it.value == '' || it.value == 0 || it.value == false){
			 		it.validation += 1;
			 		it.validationMsg.push("Este campo es obligatorio.");
			 	}
 			}, 
			sendResponse : function (){
				it.boxMsg[0].innerHTML = ''
				it.boxMsg[0].classList.add("hidden") 			 	
			 	if(it.validation > 0){
			 		el.setAttribute('validation', 'false')
			 		for(var e = 0 ; e < el.getElementsByTagName('label').length ; e++){
			 			el.getElementsByTagName('label')[e].classList.remove("done")
			 			el.getElementsByTagName('label')[e].classList.add("error")
					}
			 		it.boxMsg[0].classList.remove("hidden") 
			 		
			 		for(var msg in it.validationMsg){
			 			it.boxMsg[0].innerHTML += it.validationMsg[msg]+"<br>"
			 		}			 		
			 	}else{
			 		el.setAttribute('validation', 'true')
			 		for(var e = 0 ; e < el.getElementsByTagName('label').length ; e++){
			 			el.getElementsByTagName('label')[e].classList.remove("error")
						el.getElementsByTagName('label')[e].classList.add("done")
					}
			 		
			 	}
				it.parent.validation()
			}			
		}
     	if(el.dataset.label !== undefined){ it.label = JSON.parse(el.dataset.label) } 	
		
     	eval('it.init_'+b.arg+'()');
     	it.validate();
		it.sendResponse();
		  
     }
 }

 
 
 </script>