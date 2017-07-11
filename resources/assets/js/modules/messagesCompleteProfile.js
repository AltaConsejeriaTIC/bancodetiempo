jQuery(document).ready(function(){
    if(jQuery("#messagesProfile").length){
        jQuery("#messagesProfile .close").on('click', close);
    }
});
function close(){
    jQuery("#messagesProfile").animate({height:"0px"}, 400, function(){
        jQuery("#messagesProfile").remove();
        jQuery.ajax({
            url : "/hiddenMessagesCompleteProfile"
        });
    })
}
