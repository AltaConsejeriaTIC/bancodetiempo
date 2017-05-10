var listUsers = '';
jQuery(document).ready(function(){
    if(jQuery(".autoCompleteUsers").length){
        getUsers();
        initAutoComplete();
    }
})

function getUsers(){
    jQuery.ajax({
        url : "/find/users",
        async : false,
        success: function(list){
            listUsers = JSON.parse(list)
        },
        error: function(){
            getUsers();
        }
    })
}

function initAutoComplete(){
    window.classAutoComplete = {}
    jQuery(".autoCompleteUsers").each(function(){
        window.classAutoComplete[jQuery(this).attr('id')] = new autoCompleteUsers();
        window.classAutoComplete[jQuery(this).attr('id')].init({
            el : jQuery(this),
            data : listUsers,
        });
        if(jQuery(this).data("collaborators") !== undefined){
            var collaborators = jQuery(this).data("collaborators").split(",");
            for(var index in collaborators){
                window.classAutoComplete[jQuery(this).attr('id')].collaborators[collaborators[index]] = parseInt(collaborators[index]);
                window.classAutoComplete[jQuery(this).attr('id')].collaborators_name[collaborators[index]] = listUsers[collaborators[index]].first_name+" "+listUsers[collaborators[index]].last_name;
            }
            window.classAutoComplete[jQuery(this).attr('id')].printCollaborators();
            window.classAutoComplete[jQuery(this).attr('id')].checkedInput();
        }

    })
}

function autoCompleteUsers (){
    this.el = '';
    this.data = [];
    this.collaborators = [];
    this.collaborators_name = [];
    this.list = jQuery("<ul/>", {class : 'listComplete hidden'});
    this.boxCollaborators = jQuery("<div/>", {id:"collaborators"});
    this.init = function(obj){
        this.el = obj.el;
        this.data = obj.data;
        this.el.on("keyup", jQuery.proxy(this.getAutoCompleteUsers, this));
        jQuery(window).click(jQuery.proxy(this.closeAutoComplete, this));
        this.makeAutoComplete();
    }
    this.getAutoCompleteUsers = function(){
        text = this.el.val();
        if(text.length >= 1){
           this.showAutoComplete();
        }else{
           this.list.addClass("hidden");
        }
    }
    this.makeAutoComplete = function (){
        for(var obj in this.data){
            this.list.append(this.createHtml(obj))
        }
        this.list.find("input").on("change", jQuery.proxy(this.changeCollaborators, this));
        this.el.before(this.boxCollaborators);
        this.el.after(this.list);
    }
    this.createHtml = function(obj){
        var li = jQuery("<li/>", {id : "user"+this.data[obj].id, class : "hidden" });
        var input = jQuery("<input/>", {type : "checkbox", id : "collaborator"+this.data[obj].id+"_"+this.el.attr("id"), class : "list", value : this.data[obj].id });
        var label = jQuery("<label/>", {for : "collaborator"+this.data[obj].id+"_"+this.el.attr("id"), class : "col-md-12" });
        label.html("<div class='col-md-3'>"+
                        "<svg viewbox='0 0 100 100' version='1.1'>"+
                            "<defs>"+
                                "<pattern id='cover"+this.data[obj].id+"'  patternUnits='userSpaceOnUse' width='100' height='100'>"+
                                    "<image  xlink:href='"+this.data[obj].avatar+"' x='-25' width='150' height='100' />"+
                                "</pattern>"+
                            "</defs>"+
                            "<polygon id='hex' points='50 1 95 25 95 75 50 99 5 75 5 25' fill='url(#cover"+this.data[obj].id+")' stroke='#0f6784' stroke-width='3px'/>"+
                        "</svg>"+
                    "</div>"+
                    "<p><span  class='paragraph1'>"+this.data[obj].first_name+" "+this.data[obj].last_name+"</span> "+this.data[obj].email+"</p>");

        li.append(input);
        li.append(label);
        return li;

    }
    this.showAutoComplete = function (){
        var list = this.findUsers(text)
        if(list.length > 0){
            this.list.children("li").addClass("hidden")
            this.list.removeClass("hidden")
            for(var index in list){
                this.list.children("#user"+list[index]).removeClass('hidden');
            }
        }
    }
    this.changeCollaborators = function(e){
        var elemt = jQuery(e.target);
        var id = parseInt(elemt.val());
        if(elemt.is(":checked")){
            this.addCollaborator(id);
        }else{
            this.removeCollaborator(id);
        }

        this.printCollaborators();
    }
    this.addCollaborator = function (id){
        this.collaborators[id] = this.data[id].id;
        this.collaborators_name[id] = this.data[id].first_name+" "+this.data[id].last_name;
    }
    this.removeCollaborator = function(id){
        var index = this.collaborators.indexOf(this.data[id].id);
        var index_name = this.collaborators_name.indexOf(this.data[id].first_name+" "+this.data[id].last_name);
        this.collaborators.splice(index, 1);
        this.collaborators_name.splice(index_name, 1);
    }
    this.removeCollaboratorSpan = function(e){
        var elemt = jQuery(e.target);
        var id = elemt.attr('data_id');
        jQuery("#collaborator"+id+"_"+this.el.attr("id")).prop( "checked", false).trigger("change");
    }
    this.checkedInput = function(){
        for(var index in this.collaborators){
            jQuery("#collaborator"+index+"_"+this.el.attr("id")).prop( "checked", true);
        }
    }
    this.printCollaborators = function(){
        var htmlCollaborators = "";
        var listCollaborators = "";
        for(var i in this.collaborators_name){
            htmlCollaborators += "<span>"+this.collaborators_name[i]+" <i class='fa fa-close' data_id='"+this.collaborators[i]+"'></i></span>";
            listCollaborators += this.collaborators[i]+",";
        }
        this.boxCollaborators.html(htmlCollaborators);
        this.el.siblings("input[for='"+this.el.attr('id')+"']").val(listCollaborators.substr(0, listCollaborators.length-1))
        jQuery("#collaborators > span > i").on("click", jQuery.proxy(this.removeCollaboratorSpan, this))
    }
    this.findUsers = function(text){
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
    }
    this.closeAutoComplete = function (e){
        var parents = jQuery(e.target).parents();
        var parent = this.el.parent();
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
            this.el.siblings('.listComplete').addClass("hidden");
        }
    }

}
