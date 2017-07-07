jQuery(document).ready(function(){

    if(jQuery(".pagination").length){
       jQuery('.pagination > li').on('click', getPagination);
    }

});

function getPagination(){
    var page = jQuery(this).data('page');
    var route = jQuery(this).parent().data('route');
    var list = jQuery(this).parent().data('list');
    var filters = jQuery(this).parent().data('filter');
    var words = jQuery(this).parent().data('words');
    jQuery(this).parent().children(".active").removeClass('active')
    jQuery(this).addClass('active');
    getResponsePagination(route, page, filters, list, words);
}

function getResponsePagination(route, page, filters, list, words){
	jQuery.ajax({
        url: route,
        type : 'GET',
        data : {'page' : page, 'filter' : filters, 'words' : words},
        beforeSend: function(){
        	jQuery("#"+list).html();
        },
        success : function(response){
            jQuery("#"+list).html(response);
            jQuery('.pagination > li').on('click', getPagination);
        },error : function(){
        	getResponsePagination(page, filters, words);
        }
    });
}

