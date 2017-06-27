<template>
<div class="col-xs-12">
	<input type="hidden" name="icon" id="inputIcon" :value="myicon ">
	<div class="boxIcons">

      <div class="iconSites col-xs-6"><a @click="myicon = 'address-book'"><i class="fa fa-address-book" aria-hidden="true"></i> <span class="sr-only">Example of </span>address-book</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='address-book-o'"><i class="fa fa-address-book-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>address-book-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='address-card'"><i class="fa fa-address-card" aria-hidden="true"></i> <span class="sr-only">Example of </span>address-card</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='address-card-o'"><i class="fa fa-address-card-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>address-card-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='adjust'"><i class="fa fa-adjust" aria-hidden="true"></i> <span class="sr-only">Example of </span>adjust</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='anchor'"><i class="fa fa-anchor" aria-hidden="true"></i> <span class="sr-only">Example of </span>anchor</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='archive'"><i class="fa fa-archive" aria-hidden="true"></i> <span class="sr-only">Example of </span>archive</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='area-chart'"><i class="fa fa-area-chart" aria-hidden="true"></i> <span class="sr-only">Example of </span>area-chart</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='arrows'"><i class="fa fa-arrows" aria-hidden="true"></i> <span class="sr-only">Example of </span>arrows</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='arrows-h'"><i class="fa fa-arrows-h" aria-hidden="true"></i> <span class="sr-only">Example of </span>arrows-h</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='arrows-v'"><i class="fa fa-arrows-v" aria-hidden="true"></i> <span class="sr-only">Example of </span>arrows-v</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='assistive-listening-systems'"><i class="fa fa-assistive-listening-systems" aria-hidden="true"></i> <span class="sr-only">Example of </span>assistive-listening-systems</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='asterisk'"><i class="fa fa-asterisk" aria-hidden="true"></i> <span class="sr-only">Example of </span>asterisk</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='at'"><i class="fa fa-at" aria-hidden="true"></i> <span class="sr-only">Example of </span>at</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='audio-description'"><i class="fa fa-audio-description" aria-hidden="true"></i> <span class="sr-only">Example of </span>audio-description</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='car'"><i class="fa fa-automobile" aria-hidden="true"></i> <span class="sr-only">Example of </span>automobile <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='balance-scale'"><i class="fa fa-balance-scale" aria-hidden="true"></i> <span class="sr-only">Example of </span>balance-scale</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='ban'"><i class="fa fa-ban" aria-hidden="true"></i> <span class="sr-only">Example of </span>ban</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='university'"><i class="fa fa-bank" aria-hidden="true"></i> <span class="sr-only">Example of </span>bank <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bar-chart'"><i class="fa fa-bar-chart" aria-hidden="true"></i> <span class="sr-only">Example of </span>bar-chart</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bar-chart'"><i class="fa fa-bar-chart-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>bar-chart-o <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='barcode'"><i class="fa fa-barcode" aria-hidden="true"></i> <span class="sr-only">Example of </span>barcode</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bars'"><i class="fa fa-bars" aria-hidden="true"></i> <span class="sr-only">Example of </span>bars</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bath'"><i class="fa fa-bath" aria-hidden="true"></i> <span class="sr-only">Example of </span>bath</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bath'"><i class="fa fa-bathtub" aria-hidden="true"></i> <span class="sr-only">Example of </span>bathtub <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='battery-full'"><i class="fa fa-battery" aria-hidden="true"></i> <span class="sr-only">Example of </span>battery <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='battery-empty'"><i class="fa fa-battery-0" aria-hidden="true"></i> <span class="sr-only">Example of </span>battery-0 <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='battery-quarter'"><i class="fa fa-battery-1" aria-hidden="true"></i> <span class="sr-only">Example of </span>battery-1 <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='battery-half'"><i class="fa fa-battery-2" aria-hidden="true"></i> <span class="sr-only">Example of </span>battery-2 <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='battery-three-quarters'"><i class="fa fa-battery-3" aria-hidden="true"></i> <span class="sr-only">Example of </span>battery-3 <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='battery-full'"><i class="fa fa-battery-4" aria-hidden="true"></i> <span class="sr-only">Example of </span>battery-4 <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='battery-empty'"><i class="fa fa-battery-empty" aria-hidden="true"></i> <span class="sr-only">Example of </span>battery-empty</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='battery-full'"><i class="fa fa-battery-full" aria-hidden="true"></i> <span class="sr-only">Example of </span>battery-full</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='battery-half'"><i class="fa fa-battery-half" aria-hidden="true"></i> <span class="sr-only">Example of </span>battery-half</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='battery-quarter'"><i class="fa fa-battery-quarter" aria-hidden="true"></i> <span class="sr-only">Example of </span>battery-quarter</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='battery-three-quarters'"><i class="fa fa-battery-three-quarters" aria-hidden="true"></i> <span class="sr-only">Example of </span>battery-three-quarters</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bed'"><i class="fa fa-bed" aria-hidden="true"></i> <span class="sr-only">Example of </span>bed</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='beer'"><i class="fa fa-beer" aria-hidden="true"></i> <span class="sr-only">Example of </span>beer</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bell'"><i class="fa fa-bell" aria-hidden="true"></i> <span class="sr-only">Example of </span>bell</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bell-o'"><i class="fa fa-bell-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>bell-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bell-slash'"><i class="fa fa-bell-slash" aria-hidden="true"></i> <span class="sr-only">Example of </span>bell-slash</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bell-slash-o'"><i class="fa fa-bell-slash-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>bell-slash-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bicycle'"><i class="fa fa-bicycle" aria-hidden="true"></i> <span class="sr-only">Example of </span>bicycle</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='binoculars'"><i class="fa fa-binoculars" aria-hidden="true"></i> <span class="sr-only">Example of </span>binoculars</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='birthday-cake'"><i class="fa fa-birthday-cake" aria-hidden="true"></i> <span class="sr-only">Example of </span>birthday-cake</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='blind'"><i class="fa fa-blind" aria-hidden="true"></i> <span class="sr-only">Example of </span>blind</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bluetooth'"><i class="fa fa-bluetooth" aria-hidden="true"></i> <span class="sr-only">Example of </span>bluetooth</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bluetooth-b'"><i class="fa fa-bluetooth-b" aria-hidden="true"></i> <span class="sr-only">Example of </span>bluetooth-b</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bolt'"><i class="fa fa-bolt" aria-hidden="true"></i> <span class="sr-only">Example of </span>bolt</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bomb'"><i class="fa fa-bomb" aria-hidden="true"></i> <span class="sr-only">Example of </span>bomb</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='book'"><i class="fa fa-book" aria-hidden="true"></i> <span class="sr-only">Example of </span>book</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bookmark'"><i class="fa fa-bookmark" aria-hidden="true"></i> <span class="sr-only">Example of </span>bookmark</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bookmark-o'"><i class="fa fa-bookmark-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>bookmark-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='braille'"><i class="fa fa-braille" aria-hidden="true"></i> <span class="sr-only">Example of </span>braille</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='briefcase'"><i class="fa fa-briefcase" aria-hidden="true"></i> <span class="sr-only">Example of </span>briefcase</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bug'"><i class="fa fa-bug" aria-hidden="true"></i> <span class="sr-only">Example of </span>bug</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='building'"><i class="fa fa-building" aria-hidden="true"></i> <span class="sr-only">Example of </span>building</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='building-o'"><i class="fa fa-building-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>building-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bullhorn'"><i class="fa fa-bullhorn" aria-hidden="true"></i> <span class="sr-only">Example of </span>bullhorn</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bullseye'"><i class="fa fa-bullseye" aria-hidden="true"></i> <span class="sr-only">Example of </span>bullseye</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bus'"><i class="fa fa-bus" aria-hidden="true"></i> <span class="sr-only">Example of </span>bus</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='taxi'"><i class="fa fa-cab" aria-hidden="true"></i> <span class="sr-only">Example of </span>cab <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='calculator'"><i class="fa fa-calculator" aria-hidden="true"></i> <span class="sr-only">Example of </span>calculator</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='calendar'"><i class="fa fa-calendar" aria-hidden="true"></i> <span class="sr-only">Example of </span>calendar</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='calendar-check-o'"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>calendar-check-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='calendar-minus-o'"><i class="fa fa-calendar-minus-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>calendar-minus-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='calendar-o'"><i class="fa fa-calendar-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>calendar-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='calendar-plus-o'"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>calendar-plus-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='calendar-times-o'"><i class="fa fa-calendar-times-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>calendar-times-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='camera'"><i class="fa fa-camera" aria-hidden="true"></i> <span class="sr-only">Example of </span>camera</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='camera-retro'"><i class="fa fa-camera-retro" aria-hidden="true"></i> <span class="sr-only">Example of </span>camera-retro</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='car'"><i class="fa fa-car" aria-hidden="true"></i> <span class="sr-only">Example of </span>car</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='caret-square-o-down'"><i class="fa fa-caret-square-o-down" aria-hidden="true"></i> <span class="sr-only">Example of </span>caret-square-o-down</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='caret-square-o-left'"><i class="fa fa-caret-square-o-left" aria-hidden="true"></i> <span class="sr-only">Example of </span>caret-square-o-left</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='caret-square-o-right'"><i class="fa fa-caret-square-o-right" aria-hidden="true"></i> <span class="sr-only">Example of </span>caret-square-o-right</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='caret-square-o-up'"><i class="fa fa-caret-square-o-up" aria-hidden="true"></i> <span class="sr-only">Example of </span>caret-square-o-up</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='cart-arrow-down'"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> <span class="sr-only">Example of </span>cart-arrow-down</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='cart-plus'"><i class="fa fa-cart-plus" aria-hidden="true"></i> <span class="sr-only">Example of </span>cart-plus</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='cc'"><i class="fa fa-cc" aria-hidden="true"></i> <span class="sr-only">Example of </span>cc</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='certificate'"><i class="fa fa-certificate" aria-hidden="true"></i> <span class="sr-only">Example of </span>certificate</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='check'"><i class="fa fa-check" aria-hidden="true"></i> <span class="sr-only">Example of </span>check</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='check-circle'"><i class="fa fa-check-circle" aria-hidden="true"></i> <span class="sr-only">Example of </span>check-circle</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='check-circle-o'"><i class="fa fa-check-circle-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>check-circle-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='check-square'"><i class="fa fa-check-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>check-square</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='check-square-o'"><i class="fa fa-check-square-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>check-square-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='child'"><i class="fa fa-child" aria-hidden="true"></i> <span class="sr-only">Example of </span>child</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='circle'"><i class="fa fa-circle" aria-hidden="true"></i> <span class="sr-only">Example of </span>circle</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='circle-o'"><i class="fa fa-circle-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>circle-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='circle-o-notch'"><i class="fa fa-circle-o-notch" aria-hidden="true"></i> <span class="sr-only">Example of </span>circle-o-notch</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='circle-thin'"><i class="fa fa-circle-thin" aria-hidden="true"></i> <span class="sr-only">Example of </span>circle-thin</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='clock-o'"><i class="fa fa-clock-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>clock-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='clone'"><i class="fa fa-clone" aria-hidden="true"></i> <span class="sr-only">Example of </span>clone</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='times'"><i class="fa fa-close" aria-hidden="true"></i> <span class="sr-only">Example of </span>close <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='cloud'"><i class="fa fa-cloud" aria-hidden="true"></i> <span class="sr-only">Example of </span>cloud</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='cloud-download'"><i class="fa fa-cloud-download" aria-hidden="true"></i> <span class="sr-only">Example of </span>cloud-download</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='cloud-upload'"><i class="fa fa-cloud-upload" aria-hidden="true"></i> <span class="sr-only">Example of </span>cloud-upload</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='code'"><i class="fa fa-code" aria-hidden="true"></i> <span class="sr-only">Example of </span>code</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='code-fork'"><i class="fa fa-code-fork" aria-hidden="true"></i> <span class="sr-only">Example of </span>code-fork</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='coffee'"><i class="fa fa-coffee" aria-hidden="true"></i> <span class="sr-only">Example of </span>coffee</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='cog'"><i class="fa fa-cog" aria-hidden="true"></i> <span class="sr-only">Example of </span>cog</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='cogs'"><i class="fa fa-cogs" aria-hidden="true"></i> <span class="sr-only">Example of </span>cogs</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='comment'"><i class="fa fa-comment" aria-hidden="true"></i> <span class="sr-only">Example of </span>comment</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='comment-o'"><i class="fa fa-comment-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>comment-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='commenting'"><i class="fa fa-commenting" aria-hidden="true"></i> <span class="sr-only">Example of </span>commenting</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='commenting-o'"><i class="fa fa-commenting-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>commenting-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='comments'"><i class="fa fa-comments" aria-hidden="true"></i> <span class="sr-only">Example of </span>comments</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='comments-o'"><i class="fa fa-comments-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>comments-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='compass'"><i class="fa fa-compass" aria-hidden="true"></i> <span class="sr-only">Example of </span>compass</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='copyright'"><i class="fa fa-copyright" aria-hidden="true"></i> <span class="sr-only">Example of </span>copyright</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='creative-commons'"><i class="fa fa-creative-commons" aria-hidden="true"></i> <span class="sr-only">Example of </span>creative-commons</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='credit-card'"><i class="fa fa-credit-card" aria-hidden="true"></i> <span class="sr-only">Example of </span>credit-card</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='credit-card-alt'"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> <span class="sr-only">Example of </span>credit-card-alt</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='crop'"><i class="fa fa-crop" aria-hidden="true"></i> <span class="sr-only">Example of </span>crop</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='crosshairs'"><i class="fa fa-crosshairs" aria-hidden="true"></i> <span class="sr-only">Example of </span>crosshairs</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='cube'"><i class="fa fa-cube" aria-hidden="true"></i> <span class="sr-only">Example of </span>cube</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='cubes'"><i class="fa fa-cubes" aria-hidden="true"></i> <span class="sr-only">Example of </span>cubes</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='cutlery'"><i class="fa fa-cutlery" aria-hidden="true"></i> <span class="sr-only">Example of </span>cutlery</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='tachometer'"><i class="fa fa-dashboard" aria-hidden="true"></i> <span class="sr-only">Example of </span>dashboard <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='database'"><i class="fa fa-database" aria-hidden="true"></i> <span class="sr-only">Example of </span>database</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='deaf'"><i class="fa fa-deaf" aria-hidden="true"></i> <span class="sr-only">Example of </span>deaf</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='deaf'"><i class="fa fa-deafness" aria-hidden="true"></i> <span class="sr-only">Example of </span>deafness <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='desktop'"><i class="fa fa-desktop" aria-hidden="true"></i> <span class="sr-only">Example of </span>desktop</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='diamond'"><i class="fa fa-diamond" aria-hidden="true"></i> <span class="sr-only">Example of </span>diamond</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='dot-circle-o'"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>dot-circle-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='download'"><i class="fa fa-download" aria-hidden="true"></i> <span class="sr-only">Example of </span>download</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='id-card'"><i class="fa fa-drivers-license" aria-hidden="true"></i> <span class="sr-only">Example of </span>drivers-license <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='id-card-o'"><i class="fa fa-drivers-license-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>drivers-license-o <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='pencil-square-o'"><i class="fa fa-edit" aria-hidden="true"></i> <span class="sr-only">Example of </span>edit <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='ellipsis-h'"><i class="fa fa-ellipsis-h" aria-hidden="true"></i> <span class="sr-only">Example of </span>ellipsis-h</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='ellipsis-v'"><i class="fa fa-ellipsis-v" aria-hidden="true"></i> <span class="sr-only">Example of </span>ellipsis-v</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='envelope'"><i class="fa fa-envelope" aria-hidden="true"></i> <span class="sr-only">Example of </span>envelope</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='envelope-o'"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>envelope-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='envelope-open'"><i class="fa fa-envelope-open" aria-hidden="true"></i> <span class="sr-only">Example of </span>envelope-open</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='envelope-open-o'"><i class="fa fa-envelope-open-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>envelope-open-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='envelope-square'"><i class="fa fa-envelope-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>envelope-square</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='eraser'"><i class="fa fa-eraser" aria-hidden="true"></i> <span class="sr-only">Example of </span>eraser</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='exchange'"><i class="fa fa-exchange" aria-hidden="true"></i> <span class="sr-only">Example of </span>exchange</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='exclamation'"><i class="fa fa-exclamation" aria-hidden="true"></i> <span class="sr-only">Example of </span>exclamation</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='exclamation-circle'"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> <span class="sr-only">Example of </span>exclamation-circle</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='exclamation-triangle'"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <span class="sr-only">Example of </span>exclamation-triangle</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='external-link'"><i class="fa fa-external-link" aria-hidden="true"></i> <span class="sr-only">Example of </span>external-link</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='external-link-square'"><i class="fa fa-external-link-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>external-link-square</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='eye'"><i class="fa fa-eye" aria-hidden="true"></i> <span class="sr-only">Example of </span>eye</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='eye-slash'"><i class="fa fa-eye-slash" aria-hidden="true"></i> <span class="sr-only">Example of </span>eye-slash</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='eyedropper'"><i class="fa fa-eyedropper" aria-hidden="true"></i> <span class="sr-only">Example of </span>eyedropper</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='fax'"><i class="fa fa-fax" aria-hidden="true"></i> <span class="sr-only">Example of </span>fax</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='rss'"><i class="fa fa-feed" aria-hidden="true"></i> <span class="sr-only">Example of </span>feed <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='female'"><i class="fa fa-female" aria-hidden="true"></i> <span class="sr-only">Example of </span>female</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='fighter-jet'"><i class="fa fa-fighter-jet" aria-hidden="true"></i> <span class="sr-only">Example of </span>fighter-jet</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='file-archive-o'"><i class="fa fa-file-archive-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-archive-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='file-audio-o'"><i class="fa fa-file-audio-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-audio-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='file-code-o'"><i class="fa fa-file-code-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-code-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='file-excel-o'"><i class="fa fa-file-excel-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-excel-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='file-image-o'"><i class="fa fa-file-image-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-image-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='file-video-o'"><i class="fa fa-file-movie-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-movie-o <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='file-pdf-o'"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-pdf-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='file-image-o'"><i class="fa fa-file-photo-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-photo-o <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='file-image-o'"><i class="fa fa-file-picture-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-picture-o <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='file-powerpoint-o'"><i class="fa fa-file-powerpoint-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-powerpoint-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='file-audio-o'"><i class="fa fa-file-sound-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-sound-o <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='file-video-o'"><i class="fa fa-file-video-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-video-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='file-word-o'"><i class="fa fa-file-word-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-word-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='file-archive-o'"><i class="fa fa-file-zip-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-zip-o <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='film'"><i class="fa fa-film" aria-hidden="true"></i> <span class="sr-only">Example of </span>film</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='filter'"><i class="fa fa-filter" aria-hidden="true"></i> <span class="sr-only">Example of </span>filter</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='fire'"><i class="fa fa-fire" aria-hidden="true"></i> <span class="sr-only">Example of </span>fire</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='fire-extinguisher'"><i class="fa fa-fire-extinguisher" aria-hidden="true"></i> <span class="sr-only">Example of </span>fire-extinguisher</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='flag'"><i class="fa fa-flag" aria-hidden="true"></i> <span class="sr-only">Example of </span>flag</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='flag-checkered'"><i class="fa fa-flag-checkered" aria-hidden="true"></i> <span class="sr-only">Example of </span>flag-checkered</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='flag-o'"><i class="fa fa-flag-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>flag-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bolt'"><i class="fa fa-flash" aria-hidden="true"></i> <span class="sr-only">Example of </span>flash <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='flask'"><i class="fa fa-flask" aria-hidden="true"></i> <span class="sr-only">Example of </span>flask</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='folder'"><i class="fa fa-folder" aria-hidden="true"></i> <span class="sr-only">Example of </span>folder</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='folder-o'"><i class="fa fa-folder-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>folder-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='folder-open'"><i class="fa fa-folder-open" aria-hidden="true"></i> <span class="sr-only">Example of </span>folder-open</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='folder-open-o'"><i class="fa fa-folder-open-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>folder-open-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='frown-o'"><i class="fa fa-frown-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>frown-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='futbol-o'"><i class="fa fa-futbol-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>futbol-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='gamepad'"><i class="fa fa-gamepad" aria-hidden="true"></i> <span class="sr-only">Example of </span>gamepad</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='gavel'"><i class="fa fa-gavel" aria-hidden="true"></i> <span class="sr-only">Example of </span>gavel</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='cog'"><i class="fa fa-gear" aria-hidden="true"></i> <span class="sr-only">Example of </span>gear <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='cogs'"><i class="fa fa-gears" aria-hidden="true"></i> <span class="sr-only">Example of </span>gears <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='gift'"><i class="fa fa-gift" aria-hidden="true"></i> <span class="sr-only">Example of </span>gift</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='glass'"><i class="fa fa-glass" aria-hidden="true"></i> <span class="sr-only">Example of </span>glass</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='globe'"><i class="fa fa-globe" aria-hidden="true"></i> <span class="sr-only">Example of </span>globe</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='graduation-cap'"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <span class="sr-only">Example of </span>graduation-cap</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='users'"><i class="fa fa-group" aria-hidden="true"></i> <span class="sr-only">Example of </span>group <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='hand-rock-o'"><i class="fa fa-hand-grab-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-grab-o <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='hand-lizard-o'"><i class="fa fa-hand-lizard-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-lizard-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='hand-paper-o'"><i class="fa fa-hand-paper-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-paper-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='hand-peace-o'"><i class="fa fa-hand-peace-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-peace-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='hand-pointer-o'"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-pointer-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='hand-rock-o'"><i class="fa fa-hand-rock-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-rock-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='hand-scissors-o'"><i class="fa fa-hand-scissors-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-scissors-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='hand-spock-o'"><i class="fa fa-hand-spock-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-spock-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='hand-paper-o'"><i class="fa fa-hand-stop-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-stop-o <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='handshake-o'"><i class="fa fa-handshake-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>handshake-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='deaf'"><i class="fa fa-hard-of-hearing" aria-hidden="true"></i> <span class="sr-only">Example of </span>hard-of-hearing <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='hashtag'"><i class="fa fa-hashtag" aria-hidden="true"></i> <span class="sr-only">Example of </span>hashtag</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='hdd-o'"><i class="fa fa-hdd-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>hdd-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='headphones'"><i class="fa fa-headphones" aria-hidden="true"></i> <span class="sr-only">Example of </span>headphones</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='heart'"><i class="fa fa-heart" aria-hidden="true"></i> <span class="sr-only">Example of </span>heart</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='heart-o'"><i class="fa fa-heart-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>heart-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='heartbeat'"><i class="fa fa-heartbeat" aria-hidden="true"></i> <span class="sr-only">Example of </span>heartbeat</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='history'"><i class="fa fa-history" aria-hidden="true"></i> <span class="sr-only">Example of </span>history</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='home'"><i class="fa fa-home" aria-hidden="true"></i> <span class="sr-only">Example of </span>home</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bed'"><i class="fa fa-hotel" aria-hidden="true"></i> <span class="sr-only">Example of </span>hotel <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='hourglass'"><i class="fa fa-hourglass" aria-hidden="true"></i> <span class="sr-only">Example of </span>hourglass</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='hourglass-start'"><i class="fa fa-hourglass-1" aria-hidden="true"></i> <span class="sr-only">Example of </span>hourglass-1 <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='hourglass-half'"><i class="fa fa-hourglass-2" aria-hidden="true"></i> <span class="sr-only">Example of </span>hourglass-2 <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='hourglass-end'"><i class="fa fa-hourglass-3" aria-hidden="true"></i> <span class="sr-only">Example of </span>hourglass-3 <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='hourglass-end'"><i class="fa fa-hourglass-end" aria-hidden="true"></i> <span class="sr-only">Example of </span>hourglass-end</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='hourglass-half'"><i class="fa fa-hourglass-half" aria-hidden="true"></i> <span class="sr-only">Example of </span>hourglass-half</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='hourglass-o'"><i class="fa fa-hourglass-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>hourglass-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='hourglass-start'"><i class="fa fa-hourglass-start" aria-hidden="true"></i> <span class="sr-only">Example of </span>hourglass-start</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='i-cursor'"><i class="fa fa-i-cursor" aria-hidden="true"></i> <span class="sr-only">Example of </span>i-cursor</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='id-badge'"><i class="fa fa-id-badge" aria-hidden="true"></i> <span class="sr-only">Example of </span>id-badge</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='id-card'"><i class="fa fa-id-card" aria-hidden="true"></i> <span class="sr-only">Example of </span>id-card</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='id-card-o'"><i class="fa fa-id-card-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>id-card-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='picture-o'"><i class="fa fa-image" aria-hidden="true"></i> <span class="sr-only">Example of </span>image <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='inbox'"><i class="fa fa-inbox" aria-hidden="true"></i> <span class="sr-only">Example of </span>inbox</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='industry'"><i class="fa fa-industry" aria-hidden="true"></i> <span class="sr-only">Example of </span>industry</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='info'"><i class="fa fa-info" aria-hidden="true"></i> <span class="sr-only">Example of </span>info</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='info-circle'"><i class="fa fa-info-circle" aria-hidden="true"></i> <span class="sr-only">Example of </span>info-circle</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='university'"><i class="fa fa-institution" aria-hidden="true"></i> <span class="sr-only">Example of </span>institution <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='key'"><i class="fa fa-key" aria-hidden="true"></i> <span class="sr-only">Example of </span>key</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='keyboard-o'"><i class="fa fa-keyboard-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>keyboard-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='language'"><i class="fa fa-language" aria-hidden="true"></i> <span class="sr-only">Example of </span>language</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='laptop'"><i class="fa fa-laptop" aria-hidden="true"></i> <span class="sr-only">Example of </span>laptop</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='leaf'"><i class="fa fa-leaf" aria-hidden="true"></i> <span class="sr-only">Example of </span>leaf</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='gavel'"><i class="fa fa-legal" aria-hidden="true"></i> <span class="sr-only">Example of </span>legal <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='lemon-o'"><i class="fa fa-lemon-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>lemon-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='level-down'"><i class="fa fa-level-down" aria-hidden="true"></i> <span class="sr-only">Example of </span>level-down</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='level-up'"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="sr-only">Example of </span>level-up</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='life-ring'"><i class="fa fa-life-bouy" aria-hidden="true"></i> <span class="sr-only">Example of </span>life-bouy <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='life-ring'"><i class="fa fa-life-buoy" aria-hidden="true"></i> <span class="sr-only">Example of </span>life-buoy <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='life-ring'"><i class="fa fa-life-ring" aria-hidden="true"></i> <span class="sr-only">Example of </span>life-ring</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='life-ring'"><i class="fa fa-life-saver" aria-hidden="true"></i> <span class="sr-only">Example of </span>life-saver <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='lightbulb-o'"><i class="fa fa-lightbulb-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>lightbulb-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='line-chart'"><i class="fa fa-line-chart" aria-hidden="true"></i> <span class="sr-only">Example of </span>line-chart</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='location-arrow'"><i class="fa fa-location-arrow" aria-hidden="true"></i> <span class="sr-only">Example of </span>location-arrow</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='lock'"><i class="fa fa-lock" aria-hidden="true"></i> <span class="sr-only">Example of </span>lock</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='low-vision'"><i class="fa fa-low-vision" aria-hidden="true"></i> <span class="sr-only">Example of </span>low-vision</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='magic'"><i class="fa fa-magic" aria-hidden="true"></i> <span class="sr-only">Example of </span>magic</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='magnet'"><i class="fa fa-magnet" aria-hidden="true"></i> <span class="sr-only">Example of </span>magnet</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='share'"><i class="fa fa-mail-forward" aria-hidden="true"></i> <span class="sr-only">Example of </span>mail-forward <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='reply'"><i class="fa fa-mail-reply" aria-hidden="true"></i> <span class="sr-only">Example of </span>mail-reply <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='reply-all'"><i class="fa fa-mail-reply-all" aria-hidden="true"></i> <span class="sr-only">Example of </span>mail-reply-all <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='male'"><i class="fa fa-male" aria-hidden="true"></i> <span class="sr-only">Example of </span>male</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='map'"><i class="fa fa-map" aria-hidden="true"></i> <span class="sr-only">Example of </span>map</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='map-marker'"><i class="fa fa-map-marker" aria-hidden="true"></i> <span class="sr-only">Example of </span>map-marker</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='map-o'"><i class="fa fa-map-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>map-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='map-pin'"><i class="fa fa-map-pin" aria-hidden="true"></i> <span class="sr-only">Example of </span>map-pin</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='map-signs'"><i class="fa fa-map-signs" aria-hidden="true"></i> <span class="sr-only">Example of </span>map-signs</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='meh-o'"><i class="fa fa-meh-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>meh-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='microchip'"><i class="fa fa-microchip" aria-hidden="true"></i> <span class="sr-only">Example of </span>microchip</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='microphone'"><i class="fa fa-microphone" aria-hidden="true"></i> <span class="sr-only">Example of </span>microphone</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='microphone-slash'"><i class="fa fa-microphone-slash" aria-hidden="true"></i> <span class="sr-only">Example of </span>microphone-slash</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='minus'"><i class="fa fa-minus" aria-hidden="true"></i> <span class="sr-only">Example of </span>minus</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='minus-circle'"><i class="fa fa-minus-circle" aria-hidden="true"></i> <span class="sr-only">Example of </span>minus-circle</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='minus-square'"><i class="fa fa-minus-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>minus-square</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='minus-square-o'"><i class="fa fa-minus-square-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>minus-square-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='mobile'"><i class="fa fa-mobile" aria-hidden="true"></i> <span class="sr-only">Example of </span>mobile</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='mobile'"><i class="fa fa-mobile-phone" aria-hidden="true"></i> <span class="sr-only">Example of </span>mobile-phone <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='money'"><i class="fa fa-money" aria-hidden="true"></i> <span class="sr-only">Example of </span>money</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='moon-o'"><i class="fa fa-moon-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>moon-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='graduation-cap'"><i class="fa fa-mortar-board" aria-hidden="true"></i> <span class="sr-only">Example of </span>mortar-board <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='motorcycle'"><i class="fa fa-motorcycle" aria-hidden="true"></i> <span class="sr-only">Example of </span>motorcycle</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='mouse-pointer'"><i class="fa fa-mouse-pointer" aria-hidden="true"></i> <span class="sr-only">Example of </span>mouse-pointer</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='music'"><i class="fa fa-music" aria-hidden="true"></i> <span class="sr-only">Example of </span>music</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bars'"><i class="fa fa-navicon" aria-hidden="true"></i> <span class="sr-only">Example of </span>navicon <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='newspaper-o'"><i class="fa fa-newspaper-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>newspaper-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='object-group'"><i class="fa fa-object-group" aria-hidden="true"></i> <span class="sr-only">Example of </span>object-group</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='object-ungroup'"><i class="fa fa-object-ungroup" aria-hidden="true"></i> <span class="sr-only">Example of </span>object-ungroup</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='paint-brush'"><i class="fa fa-paint-brush" aria-hidden="true"></i> <span class="sr-only">Example of </span>paint-brush</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='paper-plane'"><i class="fa fa-paper-plane" aria-hidden="true"></i> <span class="sr-only">Example of </span>paper-plane</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='paper-plane-o'"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>paper-plane-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='paw'"><i class="fa fa-paw" aria-hidden="true"></i> <span class="sr-only">Example of </span>paw</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='pencil'"><i class="fa fa-pencil" aria-hidden="true"></i> <span class="sr-only">Example of </span>pencil</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='pencil-square'"><i class="fa fa-pencil-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>pencil-square</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='pencil-square-o'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>pencil-square-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='percent'"><i class="fa fa-percent" aria-hidden="true"></i> <span class="sr-only">Example of </span>percent</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='phone'"><i class="fa fa-phone" aria-hidden="true"></i> <span class="sr-only">Example of </span>phone</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='phone-square'"><i class="fa fa-phone-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>phone-square</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='picture-o'"><i class="fa fa-photo" aria-hidden="true"></i> <span class="sr-only">Example of </span>photo <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='picture-o'"><i class="fa fa-picture-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>picture-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='pie-chart'"><i class="fa fa-pie-chart" aria-hidden="true"></i> <span class="sr-only">Example of </span>pie-chart</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='plane'"><i class="fa fa-plane" aria-hidden="true"></i> <span class="sr-only">Example of </span>plane</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='plug'"><i class="fa fa-plug" aria-hidden="true"></i> <span class="sr-only">Example of </span>plug</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='plus'"><i class="fa fa-plus" aria-hidden="true"></i> <span class="sr-only">Example of </span>plus</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='plus-circle'"><i class="fa fa-plus-circle" aria-hidden="true"></i> <span class="sr-only">Example of </span>plus-circle</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='plus-square'"><i class="fa fa-plus-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>plus-square</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='plus-square-o'"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>plus-square-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='podcast'"><i class="fa fa-podcast" aria-hidden="true"></i> <span class="sr-only">Example of </span>podcast</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='power-off'"><i class="fa fa-power-off" aria-hidden="true"></i> <span class="sr-only">Example of </span>power-off</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='print'"><i class="fa fa-print" aria-hidden="true"></i> <span class="sr-only">Example of </span>print</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='puzzle-piece'"><i class="fa fa-puzzle-piece" aria-hidden="true"></i> <span class="sr-only">Example of </span>puzzle-piece</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='qrcode'"><i class="fa fa-qrcode" aria-hidden="true"></i> <span class="sr-only">Example of </span>qrcode</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='question'"><i class="fa fa-question" aria-hidden="true"></i> <span class="sr-only">Example of </span>question</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='question-circle'"><i class="fa fa-question-circle" aria-hidden="true"></i> <span class="sr-only">Example of </span>question-circle</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='question-circle-o'"><i class="fa fa-question-circle-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>question-circle-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='quote-left'"><i class="fa fa-quote-left" aria-hidden="true"></i> <span class="sr-only">Example of </span>quote-left</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='quote-right'"><i class="fa fa-quote-right" aria-hidden="true"></i> <span class="sr-only">Example of </span>quote-right</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='random'"><i class="fa fa-random" aria-hidden="true"></i> <span class="sr-only">Example of </span>random</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='recycle'"><i class="fa fa-recycle" aria-hidden="true"></i> <span class="sr-only">Example of </span>recycle</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='refresh'"><i class="fa fa-refresh" aria-hidden="true"></i> <span class="sr-only">Example of </span>refresh</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='registered'"><i class="fa fa-registered" aria-hidden="true"></i> <span class="sr-only">Example of </span>registered</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='times'"><i class="fa fa-remove" aria-hidden="true"></i> <span class="sr-only">Example of </span>remove <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bars'"><i class="fa fa-reorder" aria-hidden="true"></i> <span class="sr-only">Example of </span>reorder <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='reply'"><i class="fa fa-reply" aria-hidden="true"></i> <span class="sr-only">Example of </span>reply</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='reply-all'"><i class="fa fa-reply-all" aria-hidden="true"></i> <span class="sr-only">Example of </span>reply-all</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='retweet'"><i class="fa fa-retweet" aria-hidden="true"></i> <span class="sr-only">Example of </span>retweet</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='road'"><i class="fa fa-road" aria-hidden="true"></i> <span class="sr-only">Example of </span>road</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='rocket'"><i class="fa fa-rocket" aria-hidden="true"></i> <span class="sr-only">Example of </span>rocket</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='rss'"><i class="fa fa-rss" aria-hidden="true"></i> <span class="sr-only">Example of </span>rss</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='rss-square'"><i class="fa fa-rss-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>rss-square</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='bath'"><i class="fa fa-s15" aria-hidden="true"></i> <span class="sr-only">Example of </span>s15 <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='search'"><i class="fa fa-search" aria-hidden="true"></i> <span class="sr-only">Example of </span>search</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='search-minus'"><i class="fa fa-search-minus" aria-hidden="true"></i> <span class="sr-only">Example of </span>search-minus</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='search-plus'"><i class="fa fa-search-plus" aria-hidden="true"></i> <span class="sr-only">Example of </span>search-plus</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='paper-plane'"><i class="fa fa-send" aria-hidden="true"></i> <span class="sr-only">Example of </span>send <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='paper-plane-o'"><i class="fa fa-send-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>send-o <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='server'"><i class="fa fa-server" aria-hidden="true"></i> <span class="sr-only">Example of </span>server</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='share'"><i class="fa fa-share" aria-hidden="true"></i> <span class="sr-only">Example of </span>share</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='share-alt'"><i class="fa fa-share-alt" aria-hidden="true"></i> <span class="sr-only">Example of </span>share-alt</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='share-alt-square'"><i class="fa fa-share-alt-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>share-alt-square</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='share-square'"><i class="fa fa-share-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>share-square</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='share-square-o'"><i class="fa fa-share-square-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>share-square-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='shield'"><i class="fa fa-shield" aria-hidden="true"></i> <span class="sr-only">Example of </span>shield</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='ship'"><i class="fa fa-ship" aria-hidden="true"></i> <span class="sr-only">Example of </span>ship</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='shopping-bag'"><i class="fa fa-shopping-bag" aria-hidden="true"></i> <span class="sr-only">Example of </span>shopping-bag</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='shopping-basket'"><i class="fa fa-shopping-basket" aria-hidden="true"></i> <span class="sr-only">Example of </span>shopping-basket</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='shopping-cart'"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="sr-only">Example of </span>shopping-cart</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='shower'"><i class="fa fa-shower" aria-hidden="true"></i> <span class="sr-only">Example of </span>shower</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='sign-in'"><i class="fa fa-sign-in" aria-hidden="true"></i> <span class="sr-only">Example of </span>sign-in</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='sign-language'"><i class="fa fa-sign-language" aria-hidden="true"></i> <span class="sr-only">Example of </span>sign-language</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='sign-out'"><i class="fa fa-sign-out" aria-hidden="true"></i> <span class="sr-only">Example of </span>sign-out</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='signal'"><i class="fa fa-signal" aria-hidden="true"></i> <span class="sr-only">Example of </span>signal</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='sign-language'"><i class="fa fa-signing" aria-hidden="true"></i> <span class="sr-only">Example of </span>signing <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='sitemap'"><i class="fa fa-sitemap" aria-hidden="true"></i> <span class="sr-only">Example of </span>sitemap</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='sliders'"><i class="fa fa-sliders" aria-hidden="true"></i> <span class="sr-only">Example of </span>sliders</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='smile-o'"><i class="fa fa-smile-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>smile-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='snowflake-o'"><i class="fa fa-snowflake-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>snowflake-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='futbol-o'"><i class="fa fa-soccer-ball-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>soccer-ball-o <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='sort'"><i class="fa fa-sort" aria-hidden="true"></i> <span class="sr-only">Example of </span>sort</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='sort-alpha-asc'"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i> <span class="sr-only">Example of </span>sort-alpha-asc</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='sort-alpha-desc'"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i> <span class="sr-only">Example of </span>sort-alpha-desc</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='sort-amount-asc'"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> <span class="sr-only">Example of </span>sort-amount-asc</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='sort-amount-desc'"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i> <span class="sr-only">Example of </span>sort-amount-desc</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='sort-asc'"><i class="fa fa-sort-asc" aria-hidden="true"></i> <span class="sr-only">Example of </span>sort-asc</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='sort-desc'"><i class="fa fa-sort-desc" aria-hidden="true"></i> <span class="sr-only">Example of </span>sort-desc</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='sort-desc'"><i class="fa fa-sort-down" aria-hidden="true"></i> <span class="sr-only">Example of </span>sort-down <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='sort-numeric-asc'"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i> <span class="sr-only">Example of </span>sort-numeric-asc</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='sort-numeric-desc'"><i class="fa fa-sort-numeric-desc" aria-hidden="true"></i> <span class="sr-only">Example of </span>sort-numeric-desc</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='sort-asc'"><i class="fa fa-sort-up" aria-hidden="true"></i> <span class="sr-only">Example of </span>sort-up <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='space-shuttle'"><i class="fa fa-space-shuttle" aria-hidden="true"></i> <span class="sr-only">Example of </span>space-shuttle</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='spinner'"><i class="fa fa-spinner" aria-hidden="true"></i> <span class="sr-only">Example of </span>spinner</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='spoon'"><i class="fa fa-spoon" aria-hidden="true"></i> <span class="sr-only">Example of </span>spoon</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='square'"><i class="fa fa-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>square</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='square-o'"><i class="fa fa-square-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>square-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='star'"><i class="fa fa-star" aria-hidden="true"></i> <span class="sr-only">Example of </span>star</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='star-half'"><i class="fa fa-star-half" aria-hidden="true"></i> <span class="sr-only">Example of </span>star-half</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='star-half-o'"><i class="fa fa-star-half-empty" aria-hidden="true"></i> <span class="sr-only">Example of </span>star-half-empty <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='star-half-o'"><i class="fa fa-star-half-full" aria-hidden="true"></i> <span class="sr-only">Example of </span>star-half-full <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='star-half-o'"><i class="fa fa-star-half-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>star-half-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='star-o'"><i class="fa fa-star-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>star-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='sticky-note'"><i class="fa fa-sticky-note" aria-hidden="true"></i> <span class="sr-only">Example of </span>sticky-note</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='sticky-note-o'"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>sticky-note-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='street-view'"><i class="fa fa-street-view" aria-hidden="true"></i> <span class="sr-only">Example of </span>street-view</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='suitcase'"><i class="fa fa-suitcase" aria-hidden="true"></i> <span class="sr-only">Example of </span>suitcase</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='sun-o'"><i class="fa fa-sun-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>sun-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='life-ring'"><i class="fa fa-support" aria-hidden="true"></i> <span class="sr-only">Example of </span>support <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='tablet'"><i class="fa fa-tablet" aria-hidden="true"></i> <span class="sr-only">Example of </span>tablet</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='tachometer'"><i class="fa fa-tachometer" aria-hidden="true"></i> <span class="sr-only">Example of </span>tachometer</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='tag'"><i class="fa fa-tag" aria-hidden="true"></i> <span class="sr-only">Example of </span>tag</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='tags'"><i class="fa fa-tags" aria-hidden="true"></i> <span class="sr-only">Example of </span>tags</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='tasks'"><i class="fa fa-tasks" aria-hidden="true"></i> <span class="sr-only">Example of </span>tasks</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='taxi'"><i class="fa fa-taxi" aria-hidden="true"></i> <span class="sr-only">Example of </span>taxi</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='television'"><i class="fa fa-television" aria-hidden="true"></i> <span class="sr-only">Example of </span>television</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='terminal'"><i class="fa fa-terminal" aria-hidden="true"></i> <span class="sr-only">Example of </span>terminal</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='thermometer-full'"><i class="fa fa-thermometer" aria-hidden="true"></i> <span class="sr-only">Example of </span>thermometer <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='thermometer-empty'"><i class="fa fa-thermometer-0" aria-hidden="true"></i> <span class="sr-only">Example of </span>thermometer-0 <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='thermometer-quarter'"><i class="fa fa-thermometer-1" aria-hidden="true"></i> <span class="sr-only">Example of </span>thermometer-1 <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='thermometer-half'"><i class="fa fa-thermometer-2" aria-hidden="true"></i> <span class="sr-only">Example of </span>thermometer-2 <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='thermometer-three-quarters'"><i class="fa fa-thermometer-3" aria-hidden="true"></i> <span class="sr-only">Example of </span>thermometer-3 <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='thermometer-full'"><i class="fa fa-thermometer-4" aria-hidden="true"></i> <span class="sr-only">Example of </span>thermometer-4 <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='thermometer-empty'"><i class="fa fa-thermometer-empty" aria-hidden="true"></i> <span class="sr-only">Example of </span>thermometer-empty</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='thermometer-full'"><i class="fa fa-thermometer-full" aria-hidden="true"></i> <span class="sr-only">Example of </span>thermometer-full</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='thermometer-half'"><i class="fa fa-thermometer-half" aria-hidden="true"></i> <span class="sr-only">Example of </span>thermometer-half</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='thermometer-quarter'"><i class="fa fa-thermometer-quarter" aria-hidden="true"></i> <span class="sr-only">Example of </span>thermometer-quarter</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='thermometer-three-quarters'"><i class="fa fa-thermometer-three-quarters" aria-hidden="true"></i> <span class="sr-only">Example of </span>thermometer-three-quarters</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='thumb-tack'"><i class="fa fa-thumb-tack" aria-hidden="true"></i> <span class="sr-only">Example of </span>thumb-tack</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='thumbs-down'"><i class="fa fa-thumbs-down" aria-hidden="true"></i> <span class="sr-only">Example of </span>thumbs-down</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='thumbs-o-down'"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> <span class="sr-only">Example of </span>thumbs-o-down</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='thumbs-o-up'"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <span class="sr-only">Example of </span>thumbs-o-up</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='thumbs-up'"><i class="fa fa-thumbs-up" aria-hidden="true"></i> <span class="sr-only">Example of </span>thumbs-up</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='ticket'"><i class="fa fa-ticket" aria-hidden="true"></i> <span class="sr-only">Example of </span>ticket</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='times'"><i class="fa fa-times" aria-hidden="true"></i> <span class="sr-only">Example of </span>times</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='times-circle'"><i class="fa fa-times-circle" aria-hidden="true"></i> <span class="sr-only">Example of </span>times-circle</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='times-circle-o'"><i class="fa fa-times-circle-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>times-circle-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='window-close'"><i class="fa fa-times-rectangle" aria-hidden="true"></i> <span class="sr-only">Example of </span>times-rectangle <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='window-close-o'"><i class="fa fa-times-rectangle-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>times-rectangle-o <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='tint'"><i class="fa fa-tint" aria-hidden="true"></i> <span class="sr-only">Example of </span>tint</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='caret-square-o-down'"><i class="fa fa-toggle-down" aria-hidden="true"></i> <span class="sr-only">Example of </span>toggle-down <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='caret-square-o-left'"><i class="fa fa-toggle-left" aria-hidden="true"></i> <span class="sr-only">Example of </span>toggle-left <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='toggle-off'"><i class="fa fa-toggle-off" aria-hidden="true"></i> <span class="sr-only">Example of </span>toggle-off</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='toggle-on'"><i class="fa fa-toggle-on" aria-hidden="true"></i> <span class="sr-only">Example of </span>toggle-on</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='caret-square-o-right'"><i class="fa fa-toggle-right" aria-hidden="true"></i> <span class="sr-only">Example of </span>toggle-right <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='caret-square-o-up'"><i class="fa fa-toggle-up" aria-hidden="true"></i> <span class="sr-only">Example of </span>toggle-up <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='trademark'"><i class="fa fa-trademark" aria-hidden="true"></i> <span class="sr-only">Example of </span>trademark</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='trash'"><i class="fa fa-trash" aria-hidden="true"></i> <span class="sr-only">Example of </span>trash</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='trash-o'"><i class="fa fa-trash-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>trash-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='tree'"><i class="fa fa-tree" aria-hidden="true"></i> <span class="sr-only">Example of </span>tree</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='trophy'"><i class="fa fa-trophy" aria-hidden="true"></i> <span class="sr-only">Example of </span>trophy</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='truck'"><i class="fa fa-truck" aria-hidden="true"></i> <span class="sr-only">Example of </span>truck</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='tty'"><i class="fa fa-tty" aria-hidden="true"></i> <span class="sr-only">Example of </span>tty</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='television'"><i class="fa fa-tv" aria-hidden="true"></i> <span class="sr-only">Example of </span>tv <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='umbrella'"><i class="fa fa-umbrella" aria-hidden="true"></i> <span class="sr-only">Example of </span>umbrella</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='universal-access'"><i class="fa fa-universal-access" aria-hidden="true"></i> <span class="sr-only">Example of </span>universal-access</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='university'"><i class="fa fa-university" aria-hidden="true"></i> <span class="sr-only">Example of </span>university</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='unlock'"><i class="fa fa-unlock" aria-hidden="true"></i> <span class="sr-only">Example of </span>unlock</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='unlock-alt'"><i class="fa fa-unlock-alt" aria-hidden="true"></i> <span class="sr-only">Example of </span>unlock-alt</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='sort'"><i class="fa fa-unsorted" aria-hidden="true"></i> <span class="sr-only">Example of </span>unsorted <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='upload'"><i class="fa fa-upload" aria-hidden="true"></i> <span class="sr-only">Example of </span>upload</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='user'"><i class="fa fa-user" aria-hidden="true"></i> <span class="sr-only">Example of </span>user</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='user-circle'"><i class="fa fa-user-circle" aria-hidden="true"></i> <span class="sr-only">Example of </span>user-circle</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='user-circle-o'"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>user-circle-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='user-o'"><i class="fa fa-user-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>user-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='user-plus'"><i class="fa fa-user-plus" aria-hidden="true"></i> <span class="sr-only">Example of </span>user-plus</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='user-secret'"><i class="fa fa-user-secret" aria-hidden="true"></i> <span class="sr-only">Example of </span>user-secret</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='user-times'"><i class="fa fa-user-times" aria-hidden="true"></i> <span class="sr-only">Example of </span>user-times</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='users'"><i class="fa fa-users" aria-hidden="true"></i> <span class="sr-only">Example of </span>users</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='address-card'"><i class="fa fa-vcard" aria-hidden="true"></i> <span class="sr-only">Example of </span>vcard <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='address-card-o'"><i class="fa fa-vcard-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>vcard-o <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='video-camera'"><i class="fa fa-video-camera" aria-hidden="true"></i> <span class="sr-only">Example of </span>video-camera</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='volume-control-phone'"><i class="fa fa-volume-control-phone" aria-hidden="true"></i> <span class="sr-only">Example of </span>volume-control-phone</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='volume-down'"><i class="fa fa-volume-down" aria-hidden="true"></i> <span class="sr-only">Example of </span>volume-down</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='volume-off'"><i class="fa fa-volume-off" aria-hidden="true"></i> <span class="sr-only">Example of </span>volume-off</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='volume-up'"><i class="fa fa-volume-up" aria-hidden="true"></i> <span class="sr-only">Example of </span>volume-up</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='exclamation-triangle'"><i class="fa fa-warning" aria-hidden="true"></i> <span class="sr-only">Example of </span>warning <span class="text-muted">(alias)</span></a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='wheelchair'"><i class="fa fa-wheelchair" aria-hidden="true"></i> <span class="sr-only">Example of </span>wheelchair</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='wheelchair-alt'"><i class="fa fa-wheelchair-alt" aria-hidden="true"></i> <span class="sr-only">Example of </span>wheelchair-alt</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='wifi'"><i class="fa fa-wifi" aria-hidden="true"></i> <span class="sr-only">Example of </span>wifi</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='window-close'"><i class="fa fa-window-close" aria-hidden="true"></i> <span class="sr-only">Example of </span>window-close</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='window-close-o'"><i class="fa fa-window-close-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>window-close-o</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='window-maximize'"><i class="fa fa-window-maximize" aria-hidden="true"></i> <span class="sr-only">Example of </span>window-maximize</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='window-minimize'"><i class="fa fa-window-minimize" aria-hidden="true"></i> <span class="sr-only">Example of </span>window-minimize</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='window-restore'"><i class="fa fa-window-restore" aria-hidden="true"></i> <span class="sr-only">Example of </span>window-restore</a></div>

      <div class="iconSites col-xs-6"><a @click="myicon ='wrench'"><i class="fa fa-wrench" aria-hidden="true"></i> <span class="sr-only">Example of </span>wrench</a></div>


	</div>
</div>
</template>
<script>
export default {
    data() {
      return {myicon:this.icon};
    },
	props: ["icon"],
	mounted(){
        jQuery(".fa-"+this.icon).parent().addClass('active')
	},
	methods:{
	},
    watch: {
        myicon:function(newicon){
            jQuery(".iconSites .active").removeClass("active");
            jQuery(".fa-"+newicon).parent().addClass('active')
        }
    },
}
</script>

