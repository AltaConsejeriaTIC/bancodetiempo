jQuery(document).ready(function(){
	
	resizeBody();	
	
	jQuery(window).resize(resizeBody);
	
    if(jQuery("#messages").length){
       callMessages();
    }

    if(jQuery("select.categories").length){
       listCategories();
    }

    if(jQuery(".popup").length){
       jQuery(".popup .shadow").on("click", closePopup)
    }

    if(jQuery(".dialogBox").length){
        var top = jQuery("#logo").position().top + jQuery("#logo").height() + 20;
        var left = jQuery("#logo").position().left + jQuery("#logo").width() - 200;
        jQuery(".dialogBox").css({"top" : top+"px", "left" : left+"px"});
    }

    if(jQuery(".bannerHome").length){
       bannerHome();
    }

    if(jQuery(".transition").length){
       jQuery('.buttonTransition').on('click', nextTransition);
    }

    jQuery(".score").on("click", score);

    jQuery("#openSearch").on("click", openSearch);
    jQuery("#findMobile .close").on("click", closeSearch)

    jQuery(".sendCoordinates").on("click", sendCoordinates)
    
    jQuery(".showDetailSite").on("click", showDetailSite)

});

function showDetailSite(){
    var name = jQuery(this).find("[name='name']").val();
    jQuery("#siteName").html(name)
    var address = jQuery(this).find("[name='address']").val();
    jQuery("#siteAddress").html(address)
    var contact = jQuery(this).find("[name='contact']").val();
    jQuery("#siteContact").html(contact)
    var description = jQuery(this).find("[name='description']").val();
    jQuery("#siteDescription").html(description)
    var requirements = jQuery(this).find("[name='requirements']").val();
    jQuery("#siteRequirements").html(requirements)
    var coordinates = jQuery(this).find("[name='coordinates']").val();
    jQuery("#siteCoordinates").attr('href', 'http://maps.google.com/?q='+coordinates);
    jQuery(".sendCoordinates").attr("coordinates", coordinates);
    jQuery(".sendCoordinates").attr("nameSite", name);
}

function nextTransition(){
    jQuery(".transition").scrollTop(0);
    var open = jQuery(this).data('open');
    var next = jQuery(open);
    var current = jQuery(".transition .active");
    current.animate(current.data('out'), 500, function(){
        jQuery(this).removeClass('active');
    });
    next.addClass("active");
    next.animate(next.data('in'), 500);

}



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

function callMessages(){

    jQuery.ajax({
        url : '/messages/'+jQuery("#messages").attr('conversation'),
        type : "GET",
        data : "key="+jQuery("#keyConversation").val(),
        success : function(data){
            if(data != ""){
                jQuery("#messages").html(data);
                jQuery(".showModal").on("click", showModal);
                jQuery(".hiddenModal").on("click", hiddenModal);
            }
        }
    });
    setTimeout(callMessages, 2000);
}

function showModal(){

    var modal = jQuery(this).attr("modal");
    var deal = jQuery(this).attr("deal");
    jQuery("#"+modal).addClass("show");
    jQuery("#"+modal).find("input[name='deal_id']").val(deal)
    jQuery("#"+modal).find(".shadow").on("click", function(){
         jQuery("#"+modal).removeClass("show");
    })
}

function hiddenModal(){
    var modal = jQuery(this).attr("modal")
    jQuery("#"+modal).removeClass("show");
}


function score(){
    var score = jQuery(this).attr("score");
    var input = jQuery(this).attr("input");
    jQuery("#"+input+" + label > i").removeClass("check")
    jQuery("input[name='"+input+"']").val(score);
    jQuery("input[name='"+input+"']").attr("validation", true);
    var s = score;
    while(s > 0){
        jQuery("#"+input+" + label > .star"+s).addClass("check")
        s -= 1;
    }
}

function listCategories(){

    jQuery("select.categories").each(function(){
        jQuery(this).append("<option value=''>Seleccione una categoria</option>")
        for(var index in window.categories){
            var select = ""
            if(jQuery(this).attr("option") == window.categories[index].id){
               select = "selected";
            }
            jQuery(this).append("<option value='"+window.categories[index].id+"' "+select+">"+window.categories[index].category+"</option>")
        }
    })

}

function openSearch(){
    jQuery("#findMobile").addClass("active")
}

function closeSearch(){
    jQuery("#findMobile").removeClass("active")
}

function closePopup(){
    jQuery(".popup").fadeOut();
}

function sendCoordinates(){
	var coordinates = jQuery(this).attr("coordinates");
	coordinates = coordinates.split(",");
	jQuery("#coordinates").val('{"lat" : '+coordinates[0]+',"lng" :'+coordinates[1]+'}');
	var nameSite = jQuery(this).attr("nameSite");
	jQuery("#place").val(nameSite);
}

function resizeBody(){
	
	var height = jQuery(window).height();
	jQuery("#app").css({"min-height": height});
	jQuery(".conversationBox").css({"height": height*0.9});
	
	if(height > 1200){
		jQuery("#listMessages").css({"height": height*0.65});

	}else{
		jQuery("#listMessages").css({"height": height*0.52});
	}
	
}
