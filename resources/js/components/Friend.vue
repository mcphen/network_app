<template>
    <ul class="flw-hr">
    <li v-if="loading"><a href="#" title="" class="flww"><i class="la la-spinner"></i> Chargement</a></li>
    <li v-if="!loading" >
        <button class="btn btn-success" v-if="status==0" @click="add_friend"><i class="fa fa-plus"></i> Connecter</button>
        <button class="btn btn-success" v-if="status=='pending'" @click="accept_friend"> Accepter la demande</button>
        <span class="btn btn-warning text-white" v-if="status=='waiting'"> En attente </span>
        <span class="btn btn-success" v-if="status=='amis'"> Amis </span>
    </li>   
    </ul>
</template>

<script>
export default {
        name:"Friend",
        props:['user_id'],
        mounted() {
            axios.get('/check_realion_ship_status/'+this.user_id).then((data) =>{
              //  console.log(data);
                //console.log(data.data.status)
                this.status = data.data.status;
                this.loading = false;

               


            }).catch(function(error){
                console.log(error)
            })
        },

        data() {
            return {
                status:'',
                loading:true,
            }
        },

        methods: {
            add_friend(){
                this.loading = true;
                axios.get('/addFriend/'+this.user_id).then((data) =>{
                   // console.log(data);
                    if(data.status==200){
                        this.status ="waiting";
                        
                        this.loading = false;
                        
                        this.$noty.success( 'Votre demande a été envoyé.', {
                        killer: true,
                        timeout: 6000,
                        layout: 'topRight'
                    });
                        
                        
                    }

                }).catch(function(error){
                    console.log(error)
                })
            },
            accept_friend(){
                this.loading = true;
                axios.get('/accept/'+this.user_id).then((data) =>{
                    //console.log(data);
                    if(data.data==1){
                        this.status ="amis";
                        this.loading = false;
                        
                         this.$noty.success( 'Vous êtes désormais connectés.', {
                        killer: true,
                        timeout: 6000,
                        layout: 'topRight'
                    });
                    }

                }).catch(function(error){
                    console.log(error)
                })
            }

        },




    }
</script>

<style scoped>
    
</style>