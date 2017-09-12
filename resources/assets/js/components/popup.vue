<template>
    <div class="overlay" v-show='this.state' transition="fade" >
        <div class='overlay opaque-background' v-on:click='close()'></div>
        <div class='overlay-block-body'>
            <slot name='body'></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["name", "state", "stateInit", 'closeTime', 'time'],
        mounted(){
            var state = (this.stateInit === 'true');
            this.$parent.setMyData(this.name, state);
            var _time = 6000;
            if (this.time !== undefined) {
                _time = parseInt(this.time);
            }
            if ((this.closeTime === 'true')) {
                setTimeout(this.close, _time);
            }
        },
        methods: {
            close: function () {
                this.$parent.putMyData(this.name, false);
            }
        }
    }
</script>
