var activity = false;
var conversationId = 0;
var deal = 0;
var me = 0;
jQuery(document).ready(function(){
    if(jQuery(".showConversation").length){
        jQuery(".showConversation").on("click", showConversation);
    }
    if(jQuery(".closeConversation").length){
        jQuery(".closeConversation").on("click", closeConversation);
    }
    if(jQuery("form.sendMenssages").length){
        jQuery("form.sendMenssages").on("submit", sendMenssage);
    }
    me = jQuery("#meId").val();
    jQuery("form.newDeal").on("submit", createDeal);
    
    jQuery.datetimepicker.setLocale('es');
    jQuery('#dateDeal').datetimepicker();
})

function showConversation(){
    closeConversation();
    activeElements();
    conversationId = jQuery(this).data('conversation');
    jQuery("article.dealBox").height(jQuery("[canvas].active").height()+30);
    activity = true;  
    callMessages();
    callDeals();
}

function activeElements(){
    jQuery(".conversation").addClass("active")
    jQuery(".listConversation").removeClass("active");
    jQuery(".conversation .controllers").removeClass('hidden');
    jQuery(".conversation .dealBox").removeClass('hidden');
    jQuery("#deal").addClass("active");
    setTimeout(function(){
        jQuery(".conversation > .box").scrollTop(jQuery(".conversation > .box").prop('scrollHeight'));
    }, 200);  
}

function callMessages(){
    if(!activity){
        return false;
    }
    jQuery.ajax({
        url : '/messages/'+conversationId,
        type : "GET",
        data : "key="+jQuery("#keyConversation").val(),
        success : function(data){
            if(data != ""){
                jQuery(".conversation > .box").html(data);
            }
        }
    });
    setTimeout(callMessages, 2000);
}

function sendMenssage(){
    var message = jQuery(this).find("#message").val();
    var sender = jQuery(this).find("#senderInput").val();
    var token = jQuery(this).find("input[name='_token']").val();
    if(message.length > 1){
        var data = {"message" : message, "conversation": conversationId, "sender" : sender, '_token' : token}
        var e = this;
        jQuery.ajax({
            type: "POST",
            url: "/newMessage",
            data: data,
            success: function(datos){
                callMessages(conversationId);
                setTimeout(function(){
                    jQuery(".conversation > .box").scrollTop(jQuery(".conversation > .box").prop('scrollHeight'));
                }, 200);
            }
        })
    }
    jQuery(this).find("#message").val("")
    return false;
}

function closeConversation(){
    jQuery(".conversation").removeClass("active");
    jQuery(".listConversation").addClass("active");
    jQuery(".conversation > .box").html('');
    jQuery(".conversation .controllers").addClass('hidden');
    jQuery(".conversation .dealBox").addClass('hidden');
    jQuery("[canvas].active").removeClass("active");
    activity = false;
}

function callDeals(){
    if(!activity){
        return false;
    }
    jQuery.ajax({
        url : '/getDeals',
        data: {"conversation" : conversationId},
        type : "GET",
        success : function(data){
            var data = JSON.parse(data);
            if(data.deal != deal){
                printDeal(data)
                deal = data.deal;
                jQuery("form.cancelDeal").on("submit", cancelDeal);
            }
        }
    });
    setTimeout(callDeals, 2000);
}

function printDeal(data){
    if(data.state == 'error'){
        
    }else{
        if(data.deal == 'none'){
            jQuery("#deal").addClass("active");
        }else{
            jQuery("[canvas].active").removeClass("active");
            jQuery("#dealDetail").addClass("active");
            printDealDetails(data)
            var h = jQuery("[canvas].active").height()+30;
            jQuery("article.dealBox").height(h);
        }
    }
}

function createDeal(){
    var data = {
        "conversation" : conversationId,
        "date" : jQuery(this).find("[name='date']").val(),
        "place" : jQuery(this).find("[name='place']").val(),
        "observations" : jQuery(this).find("[name='observations']").val(),
        "credits" : jQuery(this).find("[name='credits']:checked").val(),
        "coordinates" : jQuery(this).find("[name='coordinates']").val(),
        "_token" : jQuery(this).find("[name='_token']").val()
    };
    jQuery.ajax({
        type: "POST",
        url: "/deal",
        data: data,
        beforeSend: function(){
            jQuery("#dealForm").find(".loadBox").addClass("active")
            jQuery("form.newDeal").off("submit");            
        },
        success: function(datos){
            jQuery("#dealForm").find(".loadBox").removeClass("active")
            jQuery("form.newDeal").trigger("reset");
            jQuery("form.newDeal").on("submit", createDeal);
        }
    });
    return false;
}

function cancelDeal(){
    var data = {
        "conversation" : conversationId,
        "_token" : jQuery(this).find("[name='_token']").val()
    };
    jQuery.ajax({
        type: "POST",
        url: "/cancelDeal",
        data: data,
        beforeSend: function(){
            jQuery("form.cancelDeal").off("submit");
        },
        success: function(datos){

        }
    });
    return false;
}

function aceptDeal(){
    var data = {
        "conversation" : conversationId,
        "_token" : jQuery(this).find("[name='_token']").val()
    };
    jQuery.ajax({
        type: "POST",
        url: "/aceptDeal",
        data: data,
        beforeSend: function(){
            jQuery("form.aceptDeal").off("submit");
        },
        success: function(datos){

        }
    });
    return false;
}

function printDealDetails(data){
    var message = getMessageState(data)
    jQuery("#dealMessage").html(message);    
    jQuery("#dealNameService").html(data.service);    
    jQuery("#dealDate").html(data.date);    
    jQuery("#dealPlace").html(data.place);    
    jQuery("#dealCredits").html(data.credits);    
    jQuery("#dealObservations").html(data.observations);    
    jQuery(".conversation .dealDetail").removeClass('hidden');
    showButtonCurrentAction(data);
    showMapDeal('dealMap', data.coordinates);
}

function showButtonCurrentAction(data){
    jQuery(".buttonAction").addClass("hidden");
    switch(data.deal_state){
        case 4:
            if(data.creator == me){
                jQuery("#buttonCancelDeal").removeClass("hidden");
            }else{
                jQuery("form.aceptDeal").on("submit", aceptDeal);
                jQuery("#buttonControlsDeal").removeClass("hidden"); 
            }
        break;
        case 7:
            jQuery("form.cancelDeal").on("submit", cancelDeal);
            jQuery("#buttonCancelDeal").removeClass("hidden");
        break;
        case 8:
            jQuery("#buttonNewDeal").removeClass("hidden");
        break;
    }
}

function getMessageState(data){
    var message = '';
    switch(data.deal_state){
        case 4:
            message = getMessageStatePending(data);
        break;
        case 7:
            message = getMessageStateAcepted(data);
        break;
        case 8:
            message = getMessageStateCancel(data);
        break;
    }
    return message;
}

function getMessageStatePending(data){
    if(data.creator == me){
       return '¡Has enviado una propuesta de Cambalache!';
    }else{
        return data.creator_name+' te ha enviado una propuesta de Cambalache!';
    }
}
function getMessageStateCancel(data){
    return '¡Tu propuesta fue rechazada!';  
}
function getMessageStateAcepted(data){
    return '¡Tienes un Cambalache!';  
}

function removeDealDetails(data){
    jQuery("#dealNameService").html('');    
    jQuery("#dealDate").html('');    
    jQuery("#dealPlace").html('');    
    jQuery("#dealCredits").html('');    
    jQuery("#dealObservations").html('');    
    jQuery(".conversation .dealDetail").addClass('hidden');
}

function showMapDeal(canvas, coordinates) {
    var coordinates = JSON.parse(coordinates);
    jQuery("#"+canvas).html('<iframe  width="100%"  height="80"  frameborder="0" style="border:0"  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDQ1hu4U00cnsBu_NCks2fg8CiIuVDD2E8&q='+coordinates.lat+','+coordinates.lng+'" allowfullscreen></iframe>');

}
