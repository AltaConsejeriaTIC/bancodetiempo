<template>
<div class='sliders' >
	<div :style='{width:w+"%"}'>
		<slot name='sliders'></slot>
	</div>
</div>
		

</template>
<script>

export default {
	data:function(){
		return {
			w:0,
			sliders:[]
		}
	},
	props: [],	
	mounted(){

		this.sliders = this.$el.getElementsByClassName("slide")
		var elem = this.$el;
		this.w = this.sliders.length*100;
		for(var s = 0; s < this.sliders.length; s++){
			this.sliders[s].style.width = 100/this.sliders.length+"%";
			this.sliders[s].classList.add("hidden")
			var buttons = this.sliders[s].getElementsByClassName("next");
			for(var b = 0; b < buttons.length; b++){
				buttons[b].addEventListener("click", function(el){
					var sliders = elem.getElementsByClassName("slide")
					for(var s = 0; s < sliders.length; s++){
						sliders[s].classList.add("hidden");
					}
					document.getElementById(el.srcElement.getAttribute('next')).classList.remove("hidden");
				});
			}
			document.getElementById("start").classList.remove("hidden");
		}
	},
	methods:{
		
	}
}
</script>