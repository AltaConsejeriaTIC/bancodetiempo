jQuery(document).ready(function(){
    if(jQuery(".preview").length){
       jQuery(".preview").each(function(){
           jQuery(this).on('change' ,previewImage);
       })
    }

    if(jQuery(".previewSvg").length){
       jQuery(".previewSvg").each(function(){
           jQuery(this).on('change' ,previewImageSvg);
       })
    }

})

function previewImage(e){
    var elemt = jQuery(e.target);
    var id =  e.target.id;
    var files = e.target.files;
    var label = jQuery("label[for='"+id+"']");
    if(files[0].size < 2000000){
        label.siblings(".error").remove();
        var image = new Image();
        var reader = new FileReader();
         reader.onload = (e) => {
             label.css("background-image", "url('"+e.target.result+"')")
             if(elemt.data('mirror') !== undefined){
                 jQuery(elemt.data('mirror')).attr("src", e.target.result);
             }
         };
        reader.readAsDataURL(files[0]);
    }else{
        label.after("<p class='msg error'>El peso máximo de la imagen debe ser de 3 Megas.</p>")
    }

}

function previewImageSvg(e){
    console.log(e)
    var id =  e.target.id;
    var files = e.target.files;
    var elemt = jQuery(e.target);
    var label = jQuery(e.target.labels[0]);
    var svg = jQuery("svg[for='"+elemt.attr('id')+"']");
    if(files[0].size < 2000000){
        label.siblings(".error").remove();
        var image = new Image();
        var reader = new FileReader();
         reader.onload = (e) => {
             svg.find('image').attr("xlink:href", e.target.result);
         };
        reader.readAsDataURL(files[0]);
    }else{
        label.after("<p class='msg error'>El peso máximo de la imagen debe ser de 3 Megas.</p>")
    }

}
