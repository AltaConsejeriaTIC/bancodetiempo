jQuery(document).ready(function(){
    jQuery(".control").change(busqueda);

    jQuery('#rango-fecha').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-success',
        cancelClass: 'btn-inverse',
    }, function(start, end, label) {
        rangoFecha(start.format('YYYY-MM-DD') + '|' + end.format('YYYY-MM-DD') );
        busqueda();
    });

    jQuery("#table-services tbody tr").on("click", modalDetailService)

    jQuery("#editState").on("click", editState)

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

function editState(){
    var text = jQuery("#d-state").text();
    jQuery("#d-state").html('<select id="inputState" class="mr-2">'+
            '<option value="1">Activo</option>'+
            '<option value="2">Inactivo</option>'+
            '<option value="3">Bloqueado</option>'+
        '</select>');
    jQuery("#d-state select option").each(function(){
        if(jQuery(this).text() == text){
            jQuery(this).prop("selected", true)
        }
    })
    jQuery(this).removeClass("btn-primary").addClass("btn-success");
    jQuery(this).find("i").removeClass("fa-edit").addClass("fa-check");
    jQuery(this).off("click");
    jQuery(this).on("click", saveState);
}

function saveState(){
    var state = jQuery("#inputState option:selected").val();
    var el = jQuery(this);
    jQuery.ajax({
        url : "/admin/changeState",
        method : "post",
        data : {_token : token, state : state, service : jQuery("#d-id").val()},
        success : function(response){
            console.log(response);
            if(response.status == "success"){
                jQuery("#d-state").text(response.state);
                el.removeClass("btn-success").addClass("btn-primary");
                el.find("i").removeClass("fa-check").addClass("fa-edit");
                el.off("click");
                el.on("click", editState);
                alert(response.message);
            }else{
                alert(response.message);
            }
        }
    })
}

function download(){
    jQuery("#download").val(1)
}

function rangoFecha(fecha){
    jQuery("#rangoFecha").val(fecha)
}

function modalDetailService(){
    var service = jQuery(this).data("service");
    jQuery("#d-id").val(service);
    jQuery.ajax({
        url : "/admin/getDetailService",
        method : "get",
        data : {service : service},
        success : function(data){
            console.log(data)
            printDetailService(data);
        }
    })
    jQuery("#serviceDetail").modal("show");
}

function printDetailService(data){

    jQuery("#editState").removeClass("btn-success").addClass("btn-primary");
    jQuery("#editState").find("i").removeClass("fa-check").addClass("fa-edit");
    jQuery("#editState").off("click");
    jQuery("#editState").on("click", editState);

    jQuery("#d-cover").attr("src", "/"+data.image);
    jQuery("#d-name").text(data.name);
    jQuery("#d-description").text(data.description);

    jQuery("#d-animacion").removeAttr("class").addClass("progress");
    jQuery("#d-animacion").addClass("animacion"+data.ranking);
    jQuery("#d-ranking").text(data.ranking);
    jQuery("#d-value").text(data.value);
    jQuery("#d-state").text(data.state);
    jQuery("#d-user-name").text(data.user_name);
    jQuery("#d-avatar").attr("src", "/"+data.avatar);

    (data.presently == 1 ? jQuery("#d-modalidad-p").removeClass("d-none") : jQuery("#d-modalidad-p").addClass("d-none"));
    (data.virtually == 1 ? jQuery("#d-modalidad-v").removeClass("d-none") : jQuery("#d-modalidad-v").addClass("d-none"));

    printDealsTable(data.deals);

}

function printDealsTable(data){
    var html = "";

    for(var index in data){
        html += "<tr>";
        html += "<td>"+data[index].user.first_name+" "+data[index].user.last_name+"</td>";
        html += "<td>"+data[index].value+"</td>";
        html += "<td>"+data[index].location+"</td>";
        html += "<td>"+data[index].date+" "+data[index].time+"</td>";
        html += "<td>"+data[index].description+"</td>";
        html += "<td>"+data[index].state+"</td>";
        html += "<td>"+data[index].created_at+"</td>";
        html += "</tr>";
    }


    jQuery("#d-deals").html(html);
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
        url : "/updateUser",
        method : "post",
        data: data,
        success : function(response){
            busqueda();
        }
    });
}
