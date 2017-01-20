<template>
	<svg viewbox="0 0 100 100" version="1.1" {{isset($extra['svg']) ? $extra['svg'] : ""}} >
		<defs>
	       <pattern id="img_{{$id}}"  patternUnits="userSpaceOnUse" width="100" height="100">
	         <image  xlink:href="{{$cover}}" x="-25" width="150" height="100" {{isset($extra['image']) ? $extra['image'] : ""}} />
	       </pattern>
	     </defs>
	     <polygon id="hex" points="50 1 95 25 95 75 50 99 5 75 5 25" fill="url(#img_{{$id}})" stroke='{{isset($border) ? $border : ""}}' stroke-width='{{isset($borderSize) ? $borderSize : ""}}'  {{isset($extra['polygon']) ? $extra['polygon'] : ""}} />
	</svg>
</template>