<template>
       <div class=" bg-white p-3">
       <div class="row">
           <div v-if="listes.length>0">
               <div class="col-lg-4 col-md-5 col-sm-6 col-12" v-for="(l, index) in listes" >
               <div class="main-left-sidebar no-margin">
                    <div class="user-data full-width">
                        <div class="user-profile">
                            <a v-bind:href="'/monprofil/'+l.idutilisateurs">
                                <div class="username-dt">
                                <div class="usr-pic">
                                    <img :src="l.pics" alt="">
                                </div>
                            </div><!--username-dt end-->
                            </a>
                            
                            <div class="user-specs">
                                <h3>
                                    <a style="color: black!important" v-bind:href="'/monprofil/'+l.idutilisateurs">
                                        {{l.prenom}} {{l.nom}}
                                    </a>
                                </h3>
                                <span>Graphic</span>

                                <ul >
                                    <li v-if="l.status==0">
                                        <button @click="add_friend(l.idutilisateurs, index)" class="btn btn-outline-primary m-3">Connecter</button>
                                    </li>

                                    <li v-if="l.status==1">
                                        <button class="btn btn-outline-info m-3">Demande envoyé</button>
                                    </li>


                                </ul>
                            </div>
                        </div><!--user-profile end-->

                    </div><!--user-data end-->


                </div><!--main-left-sidebar end-->
			

           </div>
           </div>
           <div class="text-center" v-else> <h2 class="text-center">Vous n'avez aucune suggestion</h2></div>
           
        </div>
    </div><!--companies-list end-->
</template>

<script>
export default {
    name:"NetworkFollow",

    mounted(){
        this.network()
        
    },

    

    computed:{
        listes(){
            
            return this.$store.getters.all_user_network;
        },
    },

    methods: {

        network(){
        axios.get('/connection_network').then(resp =>{
                
                //console.log(resp.data);
                resp.data.forEach((post) => {
                    this.$store.commit('add_user_network', post)
                });
                
            }).catch(function(error){
                console.log(error)
            })
        },

        add_friend(id, index){
                axios.get('/addFriend/'+id).then((data) =>{
                    console.log(data);
                    if(data.status==200){

                        this.listes.splice(index,1)
                        
                        
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
            
    },

        
}
</script>
