<template>
    
</template>

<script>
export default {
    name:"Init",

    mounted() {
        
        this.get_auth_user_data();
    },

    methods: {
        get_auth_user_data(){
            axios.get('/get_auth_user_data').then((resp) =>{
                //console.log("resp");
                
                this.$store.commit('auth_user_data', resp.data);
            }).catch(function(error){
                console.log(error)
            })
        }
    },
}
</script>
