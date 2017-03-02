jQuery(document).ready(function(){
    callMessages();
})

function callMessages(){
    jQuery("#messages").load('/messages/'+jQuery("#messages").attr('conversation'), function(){
        jQuery(".showModal").on("click", showModal);
    });
    setTimeout(callMessages, 2000);
}

function initSlider(){
    var sliders = jQuery(".sliders").find(".slide");
    jQuery(".sliders").width(sliders.length*100+"%")
    sliders.addClass("hidden").each(function(){
        jQuery(this).width(100/sliders.length+"%");
        jQuery(this).find(".next").on("click", nextSlide);
    })
    jQuery(".sliders").find("[slide='start']").removeClass("hidden")
}


function showModal(){
    var shadow = jQuery("<div class='shadow'></div>");
    var content = jQuery("<div class='contactMail obs col-md-4 col-md-offset-4'></div>");
    var form = jQuery("#observations").html();
    content.append(form)
    content.find("input[name='deal_id']").val(jQuery(this).attr('deal'))
    content.find("input[name='conversation_id']").val(jQuery(this).attr('conversation'))
    jQuery("body").append(shadow);
    jQuery("body").append(content);
    initSlider();
    jQuery("#score + label > i").on("click", score)
}



function nextSlide(){
    var next =jQuery(this).attr("next");
    if(next != '' && validate(jQuery(this))){
        var sliders = jQuery(".sliders").find(".slide");
        sliders.addClass("hidden");
        jQuery(".sliders").find("[slide='"+next+"']").removeClass("hidden")
    }

}

function validate(el){
    var validation = el.attr("validation");
    if(validation === undefined){
        return true;
    }else{
        var explode = validation.split(":");
        return eval(explode[0]+"('"+explode[1]+"')");
    }

}

function required(input, el){
    console.log(jQuery(".obs").find("input[name='"+input+"']"))
    if(jQuery(".obs").find("input[name='"+input+"']").val() == ""){
        return false;
    }else{
        return true;
    }
}

function score(){
    var score = jQuery(this).attr("score");
    console.log(score)
    jQuery("#score + label > i").removeClass("check")
    jQuery("input[name='score']").val(score);
    var s = score;
    while(s > 0){
        jQuery(".star"+s).addClass("check")
        s -= 1;
    }
}
