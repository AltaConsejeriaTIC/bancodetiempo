jQuery(document).ready(function(){

    if(jQuery("#messages").length){
       callMessages();
    }

    if(jQuery("select.categories").length){
       listCategories();
    }

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

    if(jQuery(".bannerHome").length){
       bannerHome();
    }
    jQuery(".score").on("click", score)


})

function bannerHome(){
    jQuery(".bannerHome .carousel").attr("banner", 0);
    animationBanner();
}

function animationBanner(){
    var actual = jQuery(".bannerHome .carousel").attr("banner");
    var next = parseInt(actual)+1;
    var description = jQuery("#bannerDescription");
    if(actual == parseInt(jQuery(".bannerHome .carousel").attr("slider"))){
        next = 1;
    }

    description.animate({opacity:0}, 100, function(){
        var newText = jQuery(".bannerHome .carousel .banner"+next).children(".description").html();

        setTimeout(function(){
            description.html(newText);
            description.animate({opacity:100}, 800);
        }, 1000);
    })

    jQuery(".bannerHome .carousel .banner"+actual).removeClass("active");
    jQuery(".bannerHome .carousel .banner"+next).addClass("active");

    jQuery(".bannerHome .carousel").attr("banner", next);
    setTimeout(animationBanner, 4000);

}

function callMessages(){

    jQuery.ajax({
        url : '/messages/'+jQuery("#messages").attr('conversation'),
        type : "GET",
        data : "key="+jQuery("#keyConversation").val(),
        success : function(data){
            if(data != ""){
                jQuery("#messages").html(data);
                jQuery(".showModal").on("click", showModal);
                jQuery(".hiddenModal").on("click", hiddenModal);
            }
        }
    });
    setTimeout(callMessages, 2000);
}

function showModal(){

    var modal = jQuery(this).attr("modal");
    var deal = jQuery(this).attr("deal");
    jQuery("#"+modal).addClass("show");
    jQuery("#"+modal).find("input[name='deal_id']").val(deal)
    jQuery("#"+modal).find(".shadow").on("click", function(){
         jQuery("#"+modal).removeClass("show");
    })
}

function hiddenModal(){
    var modal = jQuery(this).attr("modal")
    jQuery("#"+modal).removeClass("show");
}


function score(){
    var score = jQuery(this).attr("score");
    var input = jQuery(this).attr("input");
    jQuery("#"+input+" + label > i").removeClass("check")
    jQuery("input[name='"+input+"']").val(score);
    jQuery("input[name='"+input+"']").attr("validation", true);
    var s = score;
    while(s > 0){
        jQuery("#"+input+" + label > .star"+s).addClass("check")
        s -= 1;
    }
}

function previewImage(e){
    var elemt = jQuery(e.target);
    var id =  e.target.id;
    var files = e.target.files;
    var label = jQuery(e.target.labels[0]);
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
        label.after("<p class='msg error'>El peso màximo de la imagen debe ser de 3 Megas.</p>")
    }

}

function previewImageSvg(e){
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
        label.after("<p class='msg error'>El peso màximo de la imagen debe ser de 3 Megas.</p>")
    }

}

function listCategories(){

    jQuery("select.categories").each(function(){
        jQuery(this).append("<option value=''>Seleccione una categoria</option>")
        for(var index in window.categories){
            var select = ""
            if(jQuery(this).attr("option") == window.categories[index].id){
               select = "selected";
            }
            jQuery(this).append("<option value='"+window.categories[index].id+"' "+select+">"+window.categories[index].category+"</option>")
        }
    })

}
