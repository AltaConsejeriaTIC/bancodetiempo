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
})

var activity = false;
var conversationId = 0;
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
    setTimeout(callMessages, 2000, conversationId);
}

function sendMenssage(){
    var message = jQuery(this).find("#message").val();
    var conversationId = jQuery(this).find("#conversationInput").val();
    var sender = jQuery(this).find("#senderInput").val();
    var token = jQuery(this).find("input[name='_token']").val();
    if(message.length > 1){
        var data = {"message" : message, "conversation": conversationId, "sender" : sender, '_token' : token}
        console.log(data)
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

function showConversation(){
    var conversation = jQuery(".conversation");
    conversationId = jQuery(this).data('conversation');
    jQuery(".listConversation").removeClass("active");
    conversation.addClass("active");
    conversation.find("#conversationInput").val(conversationId);
    setTimeout(function(){
        jQuery(".conversation > .box").scrollTop(jQuery(".conversation > .box").prop('scrollHeight'));
    }, 200);
    activity = true;
    callMessages();
}

function closeConversation(){
    jQuery(".conversation").removeClass("active");
    jQuery(".listConversation").addClass("active");
    jQuery(".conversation > .box").html('');
    activity = false;
}
