jQuery(document).ready(function(){
    if(jQuery(".autoCompleteUsers").length){
       initAutoComplete();
    }
})

function initAutoComplete(){
    jQuery(".autoCompleteUsers").each(function(){
        jQuery(this).before('<div id="collaborators"></div>');
        jQuery(this).after('<ul class="listComplete hidden"></ul>');
        jQuery(this).on("keyup", getAutoCompleteUsers);
        _autoCompleteUsers.el = jQuery(this);
        _autoCompleteUsers.getUsers();
        if(jQuery(this).data("collaborators") !== undefined){
            _autoCompleteUsers.collaborators = jQuery(this).data("collaborators").split(",");
        }
        console.log(_autoCompleteUsers.collaborators);
        jQuery(window).click(closeAutoComplete);
    })
}

function closeAutoComplete(e){
    var parents = jQuery(e.target).parents();
    var parent = _autoCompleteUsers.el.parent();
    var count = 0;
    for(var index in parents){
        var _class = parents[index].className;
        if(_class !== undefined){
           if(_class.search("autoComplete") >= 0){
                count += 1;
            }
        }

    }
    if(count == 0){
        _autoCompleteUsers.el.siblings('.listComplete').addClass("hidden");
    }
}

function getAutoCompleteUsers (){
    text = jQuery(this).val();
    if(text.length >= 1){
       _autoCompleteUsers.showAutoComplete(_autoCompleteUsers.findUsers(text));
    }else{
       _autoCompleteUsers.el.siblings('.listComplete').addClass("hidden");
    }
}

var _autoCompleteUsers = {
    el : '',
    data: [],
    collaborators : [],
    collaborators_name : [],
    makeAutoComplete :function (){
        var autoCompleteHtml = '';
        for(var obj in this.data){
            autoCompleteHtml += this.createHtml(obj)
        }
        this.el.siblings(".listComplete").html(autoCompleteHtml);
        this.el.siblings(".listComplete").children("li").children("input").on("change", jQuery.proxy(this.changeCollaborators, this))
    },
    createHtml : function(obj){
        return "<li id='user"+this.data[obj].id+"' class='hidden'>"+
            "<input type='checkbox' id='collaborator"+this.data[obj].id+"' class='list' value='"+this.data[obj].id+"'>"+
            "<label for='collaborator"+this.data[obj].id+"' class='col-md-12'>"+
                "<div class='col-md-3'>"+
                    "<svg viewbox='0 0 100 100' version='1.1'>"+
                        "<defs>"+
                            "<pattern id='cover"+this.data[obj].id+"'  patternUnits='userSpaceOnUse' width='100' height='100'>"+
                                "<image  xlink:href='"+this.data[obj].avatar+"' x='-25' width='150' height='100' />"+
                            "</pattern>"+
                        "</defs>"+
                        "<polygon id='hex' points='50 1 95 25 95 75 50 99 5 75 5 25' fill='url(#cover"+this.data[obj].id+")' stroke='#0f6784' stroke-width='3px'/>"+
                    "</svg>"+
                "</div>"+
                "<p><span  class='paragraph1'>"+this.data[obj].first_name+" "+this.data[obj].last_name+"</span> "+
                this.data[obj].email+"</p>"+
            "</label>"+
        "</li>";
    },
    showAutoComplete : function (list){
        if(list.length > 0){
            this.el.siblings(".listComplete").children("li").addClass("hidden")
            this.el.siblings(".listComplete").removeClass("hidden")
            for(var index in list){
                this.el.siblings(".listComplete").children("#user"+list[index]).removeClass('hidden');
            }
        }
    },
    changeCollaborators : function(e){
        var elemt = jQuery(e.target);
        var id = parseInt(elemt.val());
        if(elemt.is(":checked")){
            this.addCollaborator(id);
        }else{
            this.removeCollaborator(id);
        }

        this.printCollaborators();
    },
    addCollaborator : function (id){
        this.collaborators[id] = this.data[id].id;
        this.collaborators_name[id] = this.data[id].first_name+" "+this.data[id].last_name;
    },
    removeCollaborator : function(id){
        var index = this.collaborators.indexOf(this.data[id].id);
        var index_name = this.collaborators_name.indexOf(this.data[id].first_name+" "+this.data[id].last_name);
        this.collaborators.splice(index, 1);
        this.collaborators_name.splice(index_name, 1);
    },
    removeCollaboratorSpan : function(e){
        var elemt = jQuery(e.target);
        var id = elemt.attr('data_id');
        jQuery("#collaborator"+id).prop( "checked", false).trigger("change");
    },
    printCollaborators : function(){
        var htmlCollaborators = "";
        var listCollaborators = "";
        for(var i in this.collaborators_name){
            htmlCollaborators += "<span>"+this.collaborators_name[i]+" <i class='fa fa-close' data_id='"+this.collaborators[i]+"'></i></span>";
            listCollaborators += this.collaborators[i]+",";
        }
        this.el.siblings("#collaborators").html(htmlCollaborators);
        this.el.siblings("input[for='"+this.el.attr('name')+"']").val(listCollaborators.substr(0, listCollaborators.length-1))
        jQuery("#collaborators > span > i").on("click", jQuery.proxy(this.removeCollaboratorSpan, this))
    },
    findUsers: function(text){
        var users = [];
        for(var index in this.data){
            var name = this.data[index].first_name + " " + this.data[index].last_name;
            name = name.toLowerCase();
            text = text.toLowerCase();
            if(name.search(text) >= 0){
                users.push(this.data[index].id);
            }
        }
        return users;
    },
    getUsers : function(){
        var data
        jQuery.ajax({
            url : "/find/users",
            async : false,
            success: function(list){
                data = list
            }
        })

        this.data = JSON.parse(data);
        this.makeAutoComplete();
    }

}
