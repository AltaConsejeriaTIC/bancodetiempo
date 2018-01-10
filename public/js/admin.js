jQuery(document).ready(function(){
    jQuery(".control").change(busqueda);
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

function modalDetailUsers(){
    var user = jQuery(this).data("user");
    jQuery.ajax({
        url : "getDetailUsers",
        method : "get",
        data : {user : user},
        success : function(data){
            console.log(data)
            printDetailUser(data);
        }
    })
    jQuery(".detailBox").modal("show");
}

function printDetailUser(data){
    jQuery("#d-avatar").attr("src", "/"+data.avatar);
    jQuery("#d-name").text(data.name);
    jQuery("#i-id").val(data.id);
    jQuery("#i-name").val(data.first_name);
    jQuery("#i-lastname").val(data.last_name);
    jQuery("#d-birthDate").text(data.birthDate);
    jQuery("#d-email").text(data.email);
    jQuery("#i-email").val(data.email);
    var tipo = "Persona";
    if(data.group === 1){
        tipo = "Grupo";
    }
    jQuery("#d-tipo").text(tipo);
    jQuery("#d-dorados").text(data.credits);
    jQuery("#d-estado").text(data.state);
    jQuery("#i-state option[value='"+data.state_id+"']").prop("selected", true);
    jQuery("#d-about").text(data.aboutMe);
    jQuery("#d-animacion").removeAttr("class").addClass("progress");
    jQuery("#d-animacion").addClass("animacion"+data.ranking);
    jQuery("#d-ranking").text(data.ranking);
    jQuery("#table-servicios1 tbody").html(serviciosOfrecidos(data.serviciosOfrecidos))
    jQuery("#table-servicios2 tbody").html(serviciosAdquiridos(data.serviciosAdquiridos))
}

function serviciosOfrecidos(data){
    var html = "";
    for(var x in data){
        html += "<tr>"+
            "<td>"+data[x].nombre+"</td>"+
            "<td>"+data[x].valor+"</td>"+
            "<td>"+data[x].modalidad+"</td>"+
            "<td>"+data[x].categoria+"</td>"+
            "<td>"+data[x].estado+"</td>"+
            "</tr>";
        
    }
    return html;
}
function serviciosAdquiridos(data){
    var html = "";
    for(var x in data){
        html += "<tr>"+
            "<td>"+data[x].nombre+"</td>"+
            "<td>"+data[x].valor+"</td>"+
            "<td>"+data[x].modalidad+"</td>"+
            "<td>"+data[x].categoria+"</td>"+
            "<td>"+data[x].estado+"</td>"+
            "</tr>";
        
    }
    return html;
}

function updateUser(){
    var data = {
        _token : token,
        name : jQuery("#i-name").val(),
        lastname : jQuery("#i-lastname").val(),
        email : jQuery("#i-email").val(),
        state : jQuery("#i-state option:selected").val(),
        id : jQuery("#i-id").val()
    }
    console.log(data)
    jQuery.ajax({
        url : "updateUser",
        method : "post",
        data: data,
        success : function(response){
            busqueda();
        }
    });
}