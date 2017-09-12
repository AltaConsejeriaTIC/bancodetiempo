jQuery(document).ready(function(){
    jQuery(".buttonTransition").on("click", transition)
})

function transition(){
    var open = jQuery(this).data('open');
    jQuery("[canvas].active").removeClass("active");
    jQuery(open).addClass("active");
    adjustBox();
}
function adjustBox(){
    
    jQuery("#dealBox").height(getHeightCanvas());    
    jQuery("#conversation .box").height(getHeightBoxConversation()-getHeightCanvas()-getHeightControllers()-30);
      
}
function getHeightCanvas(){
    return jQuery("[canvas].active").height()+30;
}
function getHeightBoxConversation(){
    return jQuery("#conversation").height();
}
function getHeightControllers(){
    return jQuery("#controllers").height();
}