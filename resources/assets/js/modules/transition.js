jQuery(document).ready(function(){
    jQuery(".buttonTransition").on("click", transition)
})

function transition(){
    var open = jQuery(this).data('open');
    jQuery("[canvas].active").removeClass("active");
    jQuery(open).addClass("active");
    var h = jQuery("[canvas].active").height()+30;
    jQuery("article.dealBox").animate({"height" : h}, 500)
}
