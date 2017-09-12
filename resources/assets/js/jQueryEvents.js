jQuery(document).ready(function(){
	
	resizeBody();	
	
	jQuery(window).resize(resizeBody);

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

    jQuery(".score").on("click", score);
    jQuery("#openSearch").on("click", openSearch);
    jQuery("#findMobile .close").on("click", closeSearch)

    scrollBottom();

});

function scrollBottom(){
	var elemScroll = jQuery('.scrollBottom');
	setTimeout(function(){
		for(var e = 0; e < elemScroll.length; e++){
			elemScroll[e].scrollTop = elemScroll[e].scrollHeight;
		}
	}, 500);

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
