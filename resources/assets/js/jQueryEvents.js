jQuery(document).ready(function(){
    callMessages();
    jQuery(".score").on("click", score)
})

function callMessages(){
    jQuery("#messages").load('/messages/'+jQuery("#messages").attr('conversation'), function(){
        jQuery(".showModal").on("click", showModal);
        jQuery(".hiddenModal").on("click", hiddenModal);
    });
    setTimeout(callMessages, 2000);
}

function showModal(){

    var modal = jQuery(this).attr("modal")
    jQuery("#"+modal).addClass("show");
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
