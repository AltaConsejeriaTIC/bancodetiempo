jQuery(document).ready(function(){
    jQuery(".control").change(busqueda)
})

function busqueda(){
    var controls = jQuery(".control");
    
    url = window.location.origin+window.location.pathname+"?";
    
    controls.each(function(x){
        if(x > 0){
            url += "&"
        }
        url += jQuery(this).attr("name")+"=";
        if(jQuery(this)[0].localName == "select"){
            url += jQuery(this).children("option:selected").val()
        }else{
            url += jQuery(this).val()
        }
    })
    console.log(url)
    jQuery("#download").val("")
    window.location.href = url;
    
}

function download(){
    jQuery("#download").val(1)
}

function rangoFecha(fecha){
    jQuery("#rangoFecha").val(fecha)
}