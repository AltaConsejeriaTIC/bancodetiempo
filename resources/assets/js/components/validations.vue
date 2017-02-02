<script>

var eventForTag = {
		"INPUT[type='text']":"keyup",
		"INPUT[type='number']":"keyup",
		"INPUT[type='password']":"keyup",
		"INPUT[type='email']":"keyup",
		"INPUT[type='hidden']":"change",
		"INPUT[type='radio']":"click",
		"INPUT[type='checkbox']":"click",
}
		
var _functionElement = {};
	
function getFunctionElement(element){
		
	var validations = JSON.parse(element.dataset.validations)
	element.removeAttribute('data-validations')
	var functionElement = "var errors = 0;"
	
		for(var validation in validations){
			var _validation = validations[validation].split(":")
			if(_validation[0]=="requiredIfNot"){element.setAttribute('depend', _validation[1])}
			if(_validation.length >= 2){
				functionElement += "errors += "+_validation[0]+"('"+_validation[1]+"',this);"
			}else{
				functionElement += "errors += "+_validation[0]+"(this);"
			}

		}
	
	functionElement += "if(this.getAttribute('type') == 'radio'){"+
	"errorsRadio(this, errors)"+
	"}else if(this.getAttribute('type') == 'checkbox'){"+
	"errorsCheckbox(this, errors)"+
	"}else{"+
	"if(errors>0){this.setAttribute('validation', 'false')}else{this.setAttribute('validation', 'true')}"+
	"}"
	
	_functionElement.method = function(){eval(functionElement)}
}

function errorsRadio(el, errors){
	name = el.getAttribute('name')
	radios = el.parentNode.querySelectorAll('[name="'+name+'"]')
	var validation = true
	if(errors > 0){validation = false}
	for(var r = 0; r < radios.length; r++){
		radios[r].setAttribute("validation", validation)
	}
}

function errorsCheckbox(el, errors){
	name = el.getAttribute('depend')
	checkbox = el.parentNode.querySelectorAll('[name="'+name+'"]')
	var validation = true
	if(errors > 0){validation = false}
	for(var c = 0; c < checkbox.length; c++){
		checkbox[c].setAttribute("validation", validation)
		el.setAttribute("validation", validation)
	}
}

function required(el){

	var error = 0;
	if(el.value == "" || el.value == 0 || (el.getAttribute('type') == 'checkbox' && el.checked == false)){
		error = 1;
	}
	return error;

}

function requiredIf(depend, el){
	var error = 0;
	elDepend = el.parentNode.querySelectorAll('[name="'+depend+'"]')
	if(elDepend[0].checked && !el.checked){
		error = 1;
	}
	return error;
}

function requiredIfNot(depend, el){
	var error = 0;
	elDepend = el.parentNode.querySelectorAll('[name="'+depend+'"]')
	if(!elDepend[0].checked && !el.checked ){
		error = 1;
	}
	return error;
}

function onlyChar (el){
	var error = 0;
	var expresion = new RegExp('^[^ 0-9][a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$');

	if(!expresion.test(el.value)){
		error = 1;
	}
	return error;

}

function onlyNumber (el){
	var error = 0;
	var expresion = new RegExp('^[0-9]*$');

	if(!expresion.test(el.value)){
		error = 1;
	}
	return error;

}

function min (min, el){
	var error = 0;
	if(el.getAttribute('type') == "number"){
		if(parseInt(el.value) < min){
			var error = 1;
		}
	}else{
		if(el.value.length < min){
			var error = 1;
		}
	}	 	
	return error;
}

function max (max, el){
	var error = 0;
	if(el.getAttribute('type') == "number"){
		if(parseInt(el.value) > max){
			var error = 1;
		}
	}else{
		if(el.value.length > max){
			var error = 1;
		}
	}
	return error;
}

function email(value){
	var error = 0;
	var expresion = new RegExp(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i);

	if(!expresion.test(value)){
		error = 1;
	}
	return error;

}

function addEventElements(element){
	var tag = element.tagName;
	if(tag == "INPUT"){
		tag = tag+"[type='"+element.getAttribute('type')+"']"
	}
	event = eventForTag[tag];
	getFunctionElement(element)

	element.addEventListener(event, _functionElement.method)
}

function validateInit(element){
	
	var tag = element.tagName;
	if(tag == "INPUT"){
		tag = tag+"[type='"+element.getAttribute('type')+"']"
	}
	var eventElement = eventForTag[tag];
	var event = new CustomEvent(eventElement, {});
	element.dispatchEvent(event, true);
	
}
function validateAll(){
	var elements = parent.getElementsByClassName('validation');
	var errors = 0;
	
	for (var obj = 0; obj < elements.length; obj++){
		if(elements[obj].getAttribute('validation') == "false"){
				errors += 1;
			}
	}
	
	var senders = parent.querySelectorAll('[type="submit"]');
	if(errors > 0){
		for (var send = 0; send < senders.length; send++){
			
			senders[send].classList.add('inactive')
		}
	}else{
		for (var send = 0; send < senders.length; send++){
			
			senders[send].classList.remove('inactive')
		}
	}
	
	
}

var parent;


export default {		
	bind:function(el, b, vnode){

		parent = el;
		
		var elements = el.getElementsByClassName('validation');
		
		for (var obj = 0; obj < elements.length; obj++){
			addEventElements(elements[obj])	
			validateInit(elements[obj])
		}
		
		var senders = el.querySelectorAll('[type="submit"]');
		
		for (var send = 0; send < senders.length; send++){
			
			senders[send].setAttribute("sender" , 'sender')
		}

	}
}

</script>