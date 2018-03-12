jQuery(document).ready(function(){
    jQuery(".btn_campaign_add").on("click", passCampaignModal);
    jQuery(".btn_campaign_remove").on("click", passCampaignModalRemove);
    jQuery("[hide-in]").each(hideIn)
    jQuery("#filtroEstudiantes input").change(filtrar)
    jQuery("#downloadListStudent").on("click", function(){
        jQuery("#download").val(1);
        filtrar();
    })
})

function passCampaignModal(){
    console.log(jQuery(this).data("campaign"));
    jQuery("#modal_habilitar #campaign_id").val(jQuery(this).data("campaign"));
    jQuery("#modal_habilitar #campaign_name").text(jQuery(this).data("name"));
}
function passCampaignModalRemove(){
    console.log(jQuery(this).data("campaign"));
    jQuery("#modal_deshabilitar #campaign_id").val(jQuery(this).data("campaign"));
    jQuery("#modal_deshabilitar #campaign_name").text(jQuery(this).data("name"));
}

function hideIn(){
    var _in = jQuery(this).attr("hide-in");
    var el = jQuery(this);
    setTimeout(function(){
        el.slideUp();
    }, _in)
}
function filtrar(){
    jQuery("#filtroEstudiantes").submit();
}
