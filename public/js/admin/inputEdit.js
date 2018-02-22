(function($){
    $.fn.extend({
        inputEdit : function(data){
            var el = jQuery(this);
            var _class = data.class === undefined ? "edit" : data.class;
            var _url = data.url === undefined ? "edit" : data.url;
            var token = data.token === undefined ? "" : data.token;
            el.on("click", showInput);

            function removeInput(){
                jQuery(this).removeClass(_class)
                var text = jQuery(this).find("input").val();
                jQuery(this).html(text);
                jQuery(this).on("click", this.showInput)
            }

            function showInput(){

                jQuery("."+_class).each(removeInput)

                jQuery(this).addClass(_class);
                var text = jQuery(this).text();
                var id = jQuery(this).data("id");
                var field = jQuery(this).data("field");
                jQuery(this).html('<div class="input-group mb-3">'+
                                  '<input type="text" class="form-control" id="inputEdit" data-field="'+field+'" data-id="'+id+'" value="'+text+'" autofocus>'+
                                  '<div class="input-group-append">'+
                                    '<button class="btn btn-success" type="button"><i class="fa fa-check"></i></button>'+
                                  '</div>'+
                                '</div>');
                jQuery(this).off("click");
                jQuery(this).find("button").on("click", saveField);
            }

            function saveField(){
                var text = jQuery("#inputEdit").val();
                var id = jQuery("#inputEdit").data('id');
                var field = jQuery("#inputEdit").data('field');
                var data = {
                    _token : token,
                    newValue : text,
                    id : id,
                    field : field,
                };
                jQuery.ajax({
                    url : _url,
                    method : "post",
                    data : data,
                    beforeSend : function(){
                        jQuery(".edit-field.edit").append("<div class='preloader position-absolute'></div>");
                    },
                    success : function(response){
                        var el = jQuery(".edit-field.edit")
                        if(response.status == "success"){
                            el.html(text);
                            el.removeClass("edit").on("click", showInput)
                            alert(response.message)
                        }else{
                            if(response.message !== undefined){
                                alert(response.message)
                            }else{
                                alert("No se pudo enviar la solicitud");
                            }
                        }

                    }
                })
            }

        }
    })
})(jQuery)




