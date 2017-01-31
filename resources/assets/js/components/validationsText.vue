<script>

 export default {
     bind:function (el, b, vnode){     	     
     	var it = {
     		parent : vnode.context.$root,
     		validation : 0,
     		validationMsg : [],
     		value : b.value,
     		expr: new RegExp('^[^ ][a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$'),
			init_text:function(){
				el.classList.add("validation")
				el.innerHTML += '<input type="text" value="'+b.value+'" name="'+b.expression+'" class="'+el.dataset.inputclass+'" />';
				el.innerHTML += '<span class="fa"></span>';
				el.innerHTML += '<p class="msg hidden"></p>';
				it.addEvent('keyup');
			},
			init_textarea:function(){
				el.classList.add("validation")
				el.innerHTML += '<textarea name="'+b.expression+'" class="'+el.dataset.inputclass+'" rows="'+el.dataset.rows+'">'+b.value+'</textarea>';
				el.innerHTML += '<span class="fa hidden"></span>';
				el.innerHTML += '<p class="msg hidden"></p>';
				it.addEvent('keyup');
			},
			addEvent:function(event){
				el.children[0].addEventListener(event, function () {	
					vnode.context[b.expression] = el.children[0].value;
					it.value = el.children[0].value;
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
			 	if(it.value == '' || it.value == 0){
			 		it.validation += 1;
			 		it.validationMsg.push("Este campo es obligatorio.");
			 	}
 			}, 
			min : function (min){
			 	if(it.value.length < min){
			 		it.validation += 1;
			 		it.validationMsg.push("Este campo debe ser mínimo de "+min+" caracteres.");
			 	}
			}, 
			max : function (max){
			 	if(it.value.length > max){
			 		it.validation += 1;
			 		it.validationMsg.push("Este campo debe ser máximo de "+max+" caracteres.");
			 	}
			}, 
			onlyChar : function (){
			
			 	if(!it.expr.test(it.value)){
			 		it.validation += 1;
			 		it.validationMsg.push("El "+el.dataset.name+" no debe contener números, caracteres especiales o signos de puntuación.");
			 	}
			 	
			}, 
			sendResponse : function (){
			 	el.children[2].innerHTML = "";
			 	el.children[2].classList.add("hidden") 	
			 	if(it.validation > 0){
			 		
			 		el.setAttribute('validation', 'false')
			 		el.children[0].classList.remove("done")
			 		el.children[0].classList.add("error")
			 		el.children[1].classList.add("fa-remove")
			 		el.children[1].classList.remove("fa-check") 
			 		el.children[2].classList.remove("hidden") 			 		
			 		for(var msg in it.validationMsg){
			 			el.children[2].innerHTML += it.validationMsg[msg]+"<br>"
			 		}			 		
			 	}else{
			 		el.setAttribute('validation', 'true')
			 		el.children[0].classList.remove("error")
			 		el.children[0].classList.add("done")
			 		el.children[1].classList.remove("fa-remove")
			 		el.children[1].classList.add("fa-check")
			 		
			 	}
			 	it.parent.validation()
			}			
		}
			 	
		eval('it.init_'+b.arg+'()');
     	it.validate();
		it.sendResponse();
		  
     }
 }

 
 
 </script>