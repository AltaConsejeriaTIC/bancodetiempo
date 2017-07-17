jQuery(document).ready(function(){
    if(jQuery(".bannerHome").length){
       bannerHome();
    }
})

function bannerHome(){
    jQuery(".bannerHome .carousel").attr("banner", 0);
    animationBanner();
}

function animationBanner(){
    var actual = jQuery(".bannerHome .carousel").attr("banner");
    var next = parseInt(actual)+1;
    var description = jQuery("#bannerDescription");
    if(actual == parseInt(jQuery(".bannerHome .carousel").attr("slider"))){
        next = 1;
    }

    description.animate({opacity:0}, 100, function(){
        var newText = jQuery(".bannerHome .carousel .banner"+next).children(".description").html();

        setTimeout(function(){
            description.html(newText);
            description.animate({opacity:100}, 800);
        }, 1000);
    })

    jQuery(".bannerHome .carousel .banner"+actual).removeClass("active");
    jQuery(".bannerHome .carousel .banner"+next).addClass("active");

    jQuery(".bannerHome .carousel").attr("banner", next);
    setTimeout(animationBanner, 4000);

}
