var activity = false;
var conversationId = 0;
var deal = 0;
var me = 0;
var responseDeal = [];
var token = '';
jQuery(document).ready(init)

function init(){
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
    token = jQuery("input[name='_token']").val();
    jQuery("form.newDeal").on("submit", createDeal);
    /* datapicker */
    if(jQuery("#dateDeal").length){
        jQuery.datetimepicker.setLocale('es'); 
        jQuery('#dateDeal').datetimepicker();
        jQuery(window).resize(function(){
            setTimeout(function(){
                adjustBox();
            }, 500);
        });
    }
}

function showConversation(){
    jQuery(".reading").removeClass("reading");
    closeConversation();
    openConversation();
    conversationId = jQuery(this).data('conversation');
    jQuery(this).removeClass("notRead");
    jQuery(this).addClass("reading");
    adjustBox();
    activity = true;  
    callMessages();
    callDeals();
}
function openConversation(){
    jQuery("#conversation").addClass("active");
    jQuery("#conversation > .box").removeClass("hidden");
    jQuery(".listConversation").removeClass("active");
    jQuery("#conversation #controllers").removeClass('hidden');
    jQuery("#conversation #dealBox").removeClass('hidden');
    jQuery("#deal").addClass("active");
    setTimeout(function(){
        var scroll = jQuery("#conversation > .box").prop('scrollHeight')
        jQuery("#conversation > .box").scrollTop(scroll);
    }, 200);  
}
function closeConversation(){
    jQuery("#conversation").removeClass("active");
    jQuery("#conversation > .box").addClass("hidden");
    jQuery(".listConversation").addClass("active");
    jQuery("#conversation > .box").html('');
    jQuery("#conversation #controllers").addClass('hidden');
    jQuery("#conversation #dealBox").addClass('hidden');
    jQuery("[canvas].active").removeClass("active");
    activity = false;
    deal = 0;
    responseDeal = [];
}
function printDeal(){
    jQuery("[canvas].active").removeClass("active");
    if(responseDeal.state != 'error'){
        if(responseDeal.deal == 'none'){
            jQuery("#deal").addClass("active");
        }else{ 
            printDealAccordingState();
        }
    }
    adjustBox();
}
function printDealAccordingState(){  
    jQuery(".buttonAction").addClass("hidden")
    switch(responseDeal.deal_state){
        case 4:
            printDealPending();
        break;
        case 7:
            printDealAcepted();
        break;
        case 8:
            printDealCancel();
        break;
        case 10:
            printDealFinish();
        break;
        case 12:
            printDealForRating();
        break;
    }    
}
function printDealPending(){ 
    printDealDetails()
    if(responseDeal.creator == me){
        jQuery("#buttonCancelDeal").removeClass("hidden");
    }else{
        jQuery("form.aceptDeal").on("submit", aceptDeal);
        jQuery("#buttonControlsDeal").removeClass("hidden"); 
    }
    adjustBox();
}
function printDealAcepted(){    
    printDealDetails()
    jQuery("form.cancelDeal").on("submit", cancelDeal);
    jQuery("#buttonCancelDeal").removeClass("hidden");
    adjustBox();
}
function printDealCancel(){    
    printDealDetails()
    jQuery("#buttonNewDeal").removeClass("hidden");
    adjustBox();
}
function printDealFinish(){ 
    jQuery("#dealFinish").addClass("active");
    jQuery("#dealFinishTitle").html(getMessageState());
    jQuery("#dealUserObservation").html(getObservationsUsers());  
    jQuery("#dealFinish #buttonNewDeal").removeClass("hidden");
    adjustBox();
}
function printDealForRating(){
    jQuery("#dealScore").addClass("active");
    printDealObservations();
    adjustBox();
}
function printDealDetails(){
    jQuery("#dealDetail").addClass("active");
    jQuery("#dealMessage").html(getMessageState());    
    jQuery("#dealNameService").html(responseDeal.service);    
    jQuery("#dealDate").html(responseDeal.date);    
    jQuery("#dealPlace").html(responseDeal.place);    
    jQuery("#dealCredits").html(responseDeal.credits);    
    jQuery("#dealObservations").html(responseDeal.observations);    
    jQuery("#conversation #dealDetail").removeClass('hidden');
    showMapDeal('dealMap');
    adjustBox();
}
function printDealObservations(){
    var message = getMessageState();
    jQuery("#dealObservationTitle").html(message);  
    jQuery("#dealScoreMessage").html(message); 
    jQuery(".idConversation").val(conversationId);
    if(responseDeal.applicant == me){
        if(responseDeal.applicant_observation != null){
            jQuery("#controlsObservations").addClass("hidden");
        }
    }else{
        if(responseDeal.offerer_observation != null){
            jQuery("#controlsObservations").addClass("hidden");
        }
    }
    adjustBox();
}
/*** helpers ****/

function showMapDeal(canvas) {
    if(responseDeal.coordinates != ''){
        var coordinates = JSON.parse(responseDeal.coordinates);
        jQuery("#"+canvas).html('<iframe  width="100%"  height="80"  frameborder="0" style="border:0"  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDQ1hu4U00cnsBu_NCks2fg8CiIuVDD2E8&q='+coordinates.lat+','+coordinates.lng+'" allowfullscreen></iframe>');
    }else{
        jQuery("#"+canvas).html('');
    }
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
function getMessageState(){
    var message = '';
    switch(responseDeal.deal_state){
        case 4:
            message = getMessageStatePending();
        break;
        case 7:
            message = getMessageStateAcepted();
        break;
        case 8:
            message = getMessageStateCancel();
        break;
        case 10:
            message = getMessageStateFinish();
        break;
        case 12:
            message = getMessageStateRanking();
        break;
    }
    return message;
}
function getMessageStatePending(){
    if(responseDeal.creator == me){
       return '¡Has enviado una propuesta de Cambalache!';
    }else{
        return responseDeal.creator_name+' te ha enviado una propuesta de Cambalache!';
    }
}
function getMessageStateCancel(){
    return '¡Tu propuesta fue rechazada!';  
}
function getMessageStateAcepted(){
    return '¡Tienes un Cambalache!';  
}
function getMessageStateFinish(){
    return '¡Tu propuesta ha finalizado!';
}
function getMessageStateRanking(){
    if(responseDeal.creator == me){
        return '¡El Cambalache con '+responseDeal.receptor_name+' ha finalizado!';
    }else{
        return '¡El Cambalache con '+responseDeal.creator_name+' ha finalizado!';
    }
}

function getObservationsUsers(){
    var observation = '';
    if(responseDeal.applicant == me){
        observation = "<strong>"+responseDeal.offerer_name+" Dijo: </strong><br>" +responseDeal.offerer_observation;
        observation += "<br><strong>Tu dijiste: </strong><br>" +responseDeal.applicant_observation;
    }else{
        observation = "<strong>"+responseDeal.applicant_name+" Dijo: </strong><br>" +responseDeal.applicant_observation;
        observation += "<br><strong>Tu dijiste: </strong><br>" +responseDeal.offerer_observation;
    }
    return observation;
}

/****  AJAX  ****/

function callMessages(){
    if(!activity){
        return false;
    }
    jQuery.ajax({
        url : '/messages',
        type : "POST",
        data : {"key" : jQuery("#keyConversation").val(), 'conversationId' : conversationId, '_token' : token},
        success : function(data){
            if(data != ""){
                jQuery("#conversation > .box").html(data);
            }
        }
    });
    setTimeout(callMessages, 2000);
}
function callDeals(){
    if(!activity){
        return false;
    }
    jQuery.ajax({
        url : '/getDeals',
        data: {"conversation" : conversationId, "_token" : token},
        type : "POST",
        success : function(response){
            responseDeal = JSON.parse(response);
            if(responseDeal.deal != deal){
                printDeal()
                deal = responseDeal.deal;
                jQuery("form.cancelDeal").on("submit", cancelDeal);
            }
        }
    });
    setTimeout(callDeals, 2000);
}
function createDeal(){
    if(validateDeal(jQuery(this))){
        var data = {
            "conversation" : conversationId,
            "date" : jQuery(this).find("[name='date']").val(),
            "place" : jQuery(this).find("[name='place']").val(),
            "observations" : jQuery(this).find("[name='observations']").val(),
            "credits" : jQuery(this).find("[name='credits']:checked").val(),
            "coordinates" : jQuery(this).find("[name='coordinates']").val(),
            "_token" : token
        };
        jQuery.ajax({
            type: "POST",
            url: "/deal",
            data: data,
            async : false,
            beforeSend: function(){
                jQuery("#dealForm").find(".loadBox").addClass("active")
                jQuery("form.newDeal").off("submit");            
            },
            success: function(datos){
                callDeals();
                jQuery("#dealForm").find(".loadBox").removeClass("active")
                jQuery("form.newDeal").trigger("reset");
                jQuery("#coordinates").val('');
                jQuery("form.newDeal").on("submit", createDeal);
            },
            error: function(){
                callDeals();
                jQuery("#dealForm").find(".loadBox").removeClass("active")
                jQuery("form.newDeal").trigger("reset");
                jQuery("#coordinates").val('');
                jQuery("form.newDeal").on("submit", createDeal);
            }
        });
    }
    return false;
}

function validateDeal(el){
    jQuery(".msg > p").css("display", "none");
    var errors = 0;
    if(el.find("[name='date']").val() == ''){
        jQuery(".msg[errors='date'] > [error='required']").css("display", "block");
        errors = 1;
    }else{
        dateTimeUser = el.find("[name='date']").val().split(" ");
        dateUser = dateTimeUser[0].split("/");
        timeUser = dateTimeUser[1].split(":");        
        var today = new Date();
        var date = new Date(dateUser[0], dateUser[1]-1, dateUser[2], timeUser[0], timeUser[1], "00");
        if(+date < +today){
            jQuery(".msg[errors='date'] > [error='afterCurrentDateTime']").css("display", "block");
            errors = 1;
        }
    }
    
    if(el.find("[name='place']").val() == ''){
        jQuery(".msg[errors='place'] > [error='required']").css("display", "block");
        errors = 1;
    }
    
    if(el.find(".boxTimeDeal").find("[name='credits']:checked").length == 0){
        jQuery(".msg[errors='credits'] > [error='required']").css("display", "block");
        errors = 1;
    }
    adjustBox();
    return errors == 0;
}

function aceptDeal(){
    var data = {
        "conversation" : conversationId,
        "_token" : token
    };
    jQuery.ajax({
        type: "POST",
        url: "/aceptDeal",
        async : false,
        data: data,
        beforeSend: function(){
            jQuery("form.aceptDeal").off("submit");
        },
        success: function(datos){

        }
    });
    return false;
}

function cancelDeal(){
    var data = {
        "conversation" : conversationId,
        "_token" : token
    };
    jQuery.ajax({
        type: "POST",
        url: "/cancelDeal",
        async : false,
        data: data,
        beforeSend: function(){
            jQuery("form.cancelDeal").off("submit");
        },
        success: function(datos){

        }
    });
    return false;
}
function sendMenssage(){
    var message = jQuery(this).find("#message").val();
    var sender = jQuery(this).find("#senderInput").val();
    if(message.length > 1){
        var data = {"message" : message, "conversation": conversationId, "sender" : sender, '_token' : token}
        var e = this;
        jQuery.ajax({
            type: "POST",
            url: "/newMessage",
            async : false,
            data: data,
            success: function(datos){
                callMessages(conversationId);
                setTimeout(function(){
                    var scroll = jQuery("#conversation .box").prop('scrollHeight');
                    jQuery("#conversation .box").scrollTop(scroll);
                }, 200);
            }
        })
    }
    jQuery(this).find("#message").val("")
    return false;
}