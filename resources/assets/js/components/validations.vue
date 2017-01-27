<script>
var parent;
var value;
var validation = 0;
var expr = new RegExp('^[^ ][a-zA-ZÒ—·ÈÌÛ˙¡…Õ”⁄ ]*$')
var elem;
var elemMsg;
 export default {
   bind: function (el, binding, vnode) {
		parent = vnode.context.$parent
		parent.setMyData('validation', false)
		elem = el
		value = el.value
		console.log(el)
		
		el.addEventListener('keyup', function () {
			value = el.value
			init(binding)
		}.bind(this) );

		init(binding)
                 
         
    },
   unbind: function (el) {
         
    }
 }
 
 function init(binding, value){
 	
 	var f; //function
 	var param = '';
 	
 	validation = 0;
 	
 	for(var v in binding.value){
 		f = binding.value[v].split(":")
 		if(f.length == 2){
 			param = f[1];
 		} 		
 		eval(f[0]+'('+param+')')
 	}
 	
 	sendResponse();
 
 }
 
 function required(){
 	if(value == ''){
 		validation += 1;
 	}
 }
 
 function min(min){
 	if(value.length < min){
 		validation += 1;
 	}
 }
 
 function max(max){
 	if(value.length > max){
 		validation += 1;
 	}
 }
 
 function onlyChar(){

 	if(!expr.test(value)){
 		validation += 1;
 	}
 	
 }
 
 function sendResponse(){
 	
 	if(validation > 0){
 		parent.setMyData('validation', false)
 		elem.classList.remove("done")
 		elem.classList.add("error")
 		//elem.getElementsByTagName("span")[0].classList.remove("fa-check")
 		//elem.getElementsByTagName("span")[0].classList.add("fa-remove")
 		
 	}else{
 		parent.setMyData('validation', true)
 		elem.classList.remove("error")
 		elem.classList.add("done")
 		//elem.getElementsByTagName("span")[0].classList.remove("fa-remove")
 		//elem.getElementsByTagName("span")[0].classList.add("fa-check")
 	}
 }
 </script>