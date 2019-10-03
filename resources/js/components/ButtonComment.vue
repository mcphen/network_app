<template>
    <li><a 
        style="cursor: pointer;"
        role="button"
        aria-pressed="false"
        @click="viewComment"
        title=""><i class="fa fa-comment"> Commenter</i></a></li>
</template>

<script>
export default {
    name:"ButtonComment",

    data() {
        return {
            toggled: false,
        }
    },
    methods:{
        viewComment: function(){
            this.toggled =!this.toggled
        }
    }
}
</script>