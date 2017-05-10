<script>
/*eslint-disable*/
  const validators = {
    email : new RegExp(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/),
    url : new RegExp(/^(https?|ftp|rmtp|mms):\/\/(([A-Z0-9][A-Z0-9_-]*)(\.[A-Z0-9][A-Z0-9_-]*)+)(:(\d+))?\/?/i),
    text : new RegExp(/^[^ 0-9#][a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]*$/),
    digits : new RegExp(/^[\d() \.\:\-\+#]+$/),
    isodate : new RegExp(/^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/)
  }

  /*eslint-enable*/
  export default {
    name: 'InputTag',

    props: {
      tags: {
        type: Array,
        default: () => [],
      },
      placeholder: {
        type: String,
        default: '',
      },
      onChange: {
        type: Function,
      },
      readOnly: {
        type: Boolean,
        default: false,
      },
      validate: {
        type: String,
        default: '',
      },
    },
    data() {
      var obj = {newTag: '', suggestions:'',tagsList:''}

      return obj;
    },
    mounted() {
        this.getTags()
    },
    methods: {
      previewTags(tag){
         var n = tag.length;
         var suggestion= this.tagsList.filter( function (elemento){
            if(tag == elemento.tag.substring(0,n) ){
                return elemento.tag;
                }
         });

        var list = suggestion.map(function(item) {
                    return item['tag'];
                      });

        this.suggestions=list;
        var newSug = [];
        var arrayTags = this.tags.join()
        for(var obj in list){
            if(obj > 6){
                break;
            }
            if(arrayTags.search(list[obj]) < 0){
                newSug.push(list[obj]);
            }
        }
        this.suggestions = newSug;
        document.getElementById("intag").classList.add("open");

      },
       getTags:function(){
            this.tagsList = window.tags;
        },
      focusNewTag() {
        if (this.readOnly) { return; }
        this.$el.querySelector('.new-tag').focus();
      },
      addNew(tag) {        
        if (tag && !this.tags.includes(tag) && this.validateIfNeeded(tag)) {
          this.tags.push(tag);
          this.tagChange();
        }
        this.newTag = '';
      },
      validateIfNeeded(tagValue) {                          
        if(this.tags.length == 3)
        {
          return false;
        }
        else
        {          
          if(tagValue.length >= 3 && tagValue.length <= 15)
          {            
            if (this.validate === '' || this.validate === undefined) {
              return true;
            } else if (Object.keys(validators).indexOf(this.validate) > -1) {
              return validators[this.validate].test(tagValue);
            }
            return true;
          }
          else
          {
            return false;
          }
        }
      },
      remove(index) {
        this.tags.splice(index, 1);
        this.tagChange();
      },
      removeLastTag() {
        if (this.newTag) { return; }
        this.tags.pop();
        this.tagChange();
      },
      getPlaceholder() {
        if (!this.tags.length) {
          return this.placeholder;
        }
        return '';
      },
      tagChange() {
        if (this.onChange) {
          // avoid passing the observer
          this.onChange(JSON.parse(JSON.stringify(this.tags)));
        }
      },
    },
  };
</script>

<template>
  <div @click="focusNewTag()" v-bind:class="{'read-only': readOnly}" id="intag"   class="vue-input-tag-wrapper dropdown">
    <span v-for="(tag, index) in tags" class="input-tag">
      <span>{{ tag }}</span>
      <a v-if="!readOnly" @click.prevent.stop="remove(index)" class="remove"></a>
    </span>
    <input data-toggle="dropdown" v-if="!readOnly"  v-bind:placeholder="getPlaceholder()" type="text" v-model="newTag" v-on:keydown.delete.stop="removeLastTag()"
           v-on:keyup="previewTags(newTag)" v-on:keydown.space.enter.prevent.stop="addNew(newTag)"  class="new-tag dropdown-toggle" />
           <input type="hidden" name="tagService" :value="this.tags">
    <ul class="dropdown-menu "  >
      <li v-for="suggestion in suggestions" v-on:click="addNew(suggestion)">
        {{ suggestion }}
      </li>
    </ul>
  </div>
</template>
