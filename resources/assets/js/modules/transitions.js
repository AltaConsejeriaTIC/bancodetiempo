jQuery(document).ready(function(){
    if(jQuery("[transition]").length){
        //jQuery("[transition]").children("[canvas]:not('.active')").addClass("hidden");
       jQuery('[transition-button]').on('click', nextTransition);
    }
});

function nextTransition(){
    var open = jQuery(this).data('open');
    var next = jQuery(open);
    var current = jQuery("[canvas].active");
    startOut(current);
}

function startOut(el){
    var efex = el.data('out');
    var _class = new animations(el);
    _class['out'+efex]()
}

class animations{
    constructor(el){
        this.el = el;
    }
    outleft(){
        this.el.animate({'left':'-100%'});
    }
}
