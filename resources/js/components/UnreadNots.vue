<template>
<li>
    <a href="/notifications" title="" class="not-box-open">
        <span v-if="all_nots_count>0"><i class="fa fa-bell" style="color: red">{{all_nots_count}}</i></span>
        <span v-else><i class="fa fa-bell"></i></span>
              Notification
    </a>

</li>
</template>

<script>
export default {
    name:"UnreadNots",

    mounted() {
        this.get_unread();
    },

    methods: {
        get_unread(){
            
            axios.get('/get_unread').then(data =>{
                console.log(data)
               // this.posts = data.data
               if(data.data.length>0){
                    data.data.forEach((not) => {
                        this.$store.commit('add_not', not)
                    });
               }
               

            }).catch(function(error){
                console.log(error)
            })
        }
    },

    computed: {
        all_nots_count(){
            return this.$store.getters.all_nots_count
        }
    },
}
</script>

<style scoped>
    
</style>