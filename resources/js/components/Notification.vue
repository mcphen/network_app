<template>
    
</template>

<script>
export default {
    name:"Notification",

    mounted() {
        this.listen()
    },

    props:['idutilisateurs'],

    methods: {
        listen(){
           // console.log("hello bro");
            Echo.private('App.Users.'+this.idutilisateurs)
                .notification((notification) =>{
                    //alert('new notification');
                    //console.log(notification);
                    this.$noty.success( notification.nom+ notification.message, {
                        killer: true,
                        timeout: 6000,
                        layout: 'topRight'
                    });
                    
                    this.$store.commit('add_not', notification);
                    document.getElementById('noty_audio').play();
                })
        }
    },
}
</script>

<style scoped>
    
</style>