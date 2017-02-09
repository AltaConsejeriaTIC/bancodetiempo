<script>

var eventForTag = {
		"INPUT[type='text']":"change",
		"INPUT[type='number']":"change",
		"INPUT[type='date']":"change",
		"INPUT[type='password']":"change",
		"INPUT[type='email']":"change",
		"INPUT[type='hidden']":"change",
		"INPUT[type='radio']":"change",
		"INPUT[type='checkbox']":"change",
		"SELECT":"change",
		"TEXTAREA":"keyup",
}
		
var _functionElement = {};
	
function getFunctionElement(element){
		
	var validations = JSON.parse(element.dataset.validations)
	element.removeAttribute('data-validations')
	var functionElement = "var errors = 0;"
	
		for(var validation in validations){
			var _validation = validations[validation].split(":")
			if(_validation[0]=="requiredIfNot"){
				element.setAttribute('depend', _validation[1])
				}
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
		"if(errors>0){this.setAttribute('validation', 'false')"+
		"}else{"+
		"this.setAttribute('validation', 'true')}"+
	"}"+
	"validateAll(element.padre);"
	
	_functionElement.method = function(){eval(functionElement)}
}

function errorsRadio(el, errors){
	name = el.getAttribute('name')
	var radios = el.padre.querySelectorAll('[name="'+name+'"]')
	var validation = true
	if(errors > 0){validation = false}
	for(var r = 0; r < radios.length; r++){
		radios[r].setAttribute("validation", validation)
	}
}

function errorsCheckbox(el, errors){
	name = el.getAttribute('depend')
	var checkbox = el.padre.querySelectorAll('[name="'+name+'"]')
	var validation = true
	if(errors > 0){validation = false}
	for(var c = 0; c < checkbox.length; c++){
		checkbox[c].setAttribute("validation", validation)
		el.setAttribute("validation", validation)
	}
}

function required(el){
	var error = 0;
	var name = el.getAttribute('name')
	var type = el.getAttribute('type')
	if(el.value == "" || el.value == 0 || (type == 'checkbox' && !el.checked) ||  (type == 'radio' && el.padre.querySelectorAll('[name="'+name+'"]:checked').length == 0)){
		error = 1;
		showErrorsBox(el, "required")
	}else{
		hiddenErrorsBox(el, "required")
	}
	return error;
	
}

function requiredIf(depend, el){
	var error = 0;
	var elDepend = el.padre.querySelectorAll('[name="'+depend+'"]')
	if(elDepend[0].checked && !el.checked){
		error = 1;
		showErrorsBox(el, "requiredIf")
	}else{
		hiddenErrorsBox(el, "requiredIf")
	}
	return error;
}

function requiredIfNot(depend, el){
	var error = 0;
	var elDepend = el.padre.querySelectorAll('[name="'+depend+'"]')
	if(!elDepend[0].checked && !el.checked ){
		error = 1;
		showErrorsBox(el, "requiredIfNot")
	}else{
		hiddenErrorsBox(el, "requiredIfNot")
	}
	return error;
}

function onlyChar (el){
	var error = 0;
	var expresion = new RegExp('^[^ 0-9][a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$');
	
 	if(!expresion.test(el.value)){
 		error = 1;
 		showErrorsBox(el, "onlyChar")
	}else{
		hiddenErrorsBox(el, "onlyChar")
	}
 	return error;
 	
}

function onlyNumber (el){
	var error = 0;
	var expresion = new RegExp('^[0-9]*$');
	
 	if(!expresion.test(el.value)){
 		error = 1;
 		showErrorsBox(el, "onlyNumber")
	}else{
		hiddenErrorsBox(el, "onlyNumber")
	}
 	return error;
 	
}

function min (min, el){
	var error = 0;
	if(el.getAttribute('type') == "number"){
		if(parseInt(el.value) < min){
	 		var error = 1;
	 		showErrorsBox(el, "min")
		}else{
			hiddenErrorsBox(el, "min")
		}
	}else if(el.getAttribute('type') == "date"){
		var myYears = years(el.value)
		if(myYears < min){
			var error = 1;
	 		showErrorsBox(el, "min")
		}else{
			hiddenErrorsBox(el, "min")
		}
	}else{
		if(el.value.length < min){
	 		var error = 1;
	 		showErrorsBox(el, "min")
		}else{
			hiddenErrorsBox(el, "min")
		}
	}	 	
 	return error;
}

function years(date){
	
	var hoy = new Date() 
	var day = date.split("-")[2]
	var mounth = date.split("-")[1]
	var year = date.split("-")[0]
	var yearVal = hoy.getFullYear();
	var mounthVal = hoy.getMonth()+1
	var dayVal = hoy.getUTCDate();
	var years = 0;
	years = yearVal-year
	if(mounth <= mounthVal){
		if(mounth == mounthVal){
			if(day > dayVal){
				years = years - 1;
			}
		}
	}else{
		years = years - 1;
	}
	return years;
}

function max (max, el){
	var error = 0;
	if(el.getAttribute('type') == "number"){
		if(parseInt(el.value) > max){
	 		var error = 1;
	 		showErrorsBox(el, "max")
		}else{
			hiddenErrorsBox(el, "max")
		}
	}else{
		if(el.value.length > max){
	 		var error = 1;
	 		showErrorsBox(el, "max")
		}else{
			hiddenErrorsBox(el, "max")
		}
	}
 	return error;
}

function email(el){
	var error = 0;
	var expresion = new RegExp(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i);
	
 	if(!expresion.test(el.value)){
 		error = 1;
 		showErrorsBox(el, "email")
	}else{
		hiddenErrorsBox(el, "email")
	}
 	return error;
 	
}

function addEventElements(element){
	var tag = element.tagName;
	if(tag == "INPUT"){
		tag = tag+"[type='"+element.getAttribute('type')+"']"
	}
	var event = eventForTag[tag];
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
	
	hiddenErrorsBox(element)
	
}
function validateAll(padre){
	var elements = padre.getElementsByClassName('validation');
	var errors = 0;
	
	for (var obj = 0; obj < elements.length; obj++){
		if(elements[obj].getAttribute('validation') == "false"){
				errors += 1;
		}
	}
	var senders = padre.querySelectorAll('[type="submit"]');
	
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

function hiddenErrorsBox(element, error){
	var boxErrors = element.padre.querySelectorAll('[errors="'+element.getAttribute('name')+'"]')
	if(boxErrors.length){
		var hidden = 0;
		var allChildrens = boxErrors[0].children
		var childrens = ''
		if(error === undefined){
			childrens = allChildrens
		}else{
			childrens = boxErrors[0].querySelectorAll('[error="'+error+'"]');
		}
		
		for(var child = 0; child < childrens.length; child++){
			hidden += 1;
			childrens[child].style.display = "none"
		}
		
		if(hidden == allChildrens.length){
			boxErrors[0].style.display = "none"
		}
	}
}

function showErrorsBox(element, error){
	var boxErrors = element.padre.querySelectorAll('[errors="'+element.getAttribute('name')+'"]')
	if(boxErrors.length){
		boxErrors[0].style.display = "block"
		var childrens = boxErrors[0].querySelectorAll('[error="'+error+'"]');
		for(var child = 0; child < childrens.length; child++){
			childrens[child].style.display = "block"
		}
	}
}

var parent;


export default {		
	bind:function(el, b, vnode){

		parent = el;
		
		var elements = el.getElementsByClassName('validation');
		
		for (var obj = 0; obj < elements.length; obj++){	
			elements[obj].padre = el
			addEventElements(elements[obj])	
			validateInit(elements[obj])
		}
		
		var senders = el.querySelectorAll('[type="submit"]');
		
		for (var send = 0; send < senders.length; send++){
			
			senders[send].setAttribute("sender" , 'sender')
		}

	},
	componentUpdated:function(el, b, vnode){
		var elements = el.getElementsByClassName('validation');
		for (var obj = 0; obj < elements.length; obj++){	
			validateInit(elements[obj])
		}
	}
}

</script>