<template>
   <div class=" bg-white p-3">
       <div class="row">
           <div v-if="list.length>0">
               <div class="col-lg-4 col-md-5 col-sm-6 col-12" v-for="l in list" >
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
                                    <li>
                                        <a href="#" title="" class="btn btn-outline-primary m-3">Message</a>
                                    </li>

                                </ul>
                            </div>
                        </div><!--user-profile end-->

                    </div><!--user-data end-->


                </div><!--main-left-sidebar end-->
			

           </div>
           </div>
           <div class="text-center" v-else> <h2 class="text-center">Vous n'avez aucune relation</h2></div>
           
        </div>
    </div><!--companies-list end-->
</template>

<script>
export default {
    name:"Network",

    data() {
        return {
            list:[]
        }
    },

    created() {
        this.mynetwork()
    },

    methods: {

        mynetwork(){
        axios.get('/is_friend').then(resp =>{
                
                //console.log(resp.data);
                this.list = resp.data;
            }).catch(function(error){
                console.log(error)
            })
        }
            
        },

    
}
</script>