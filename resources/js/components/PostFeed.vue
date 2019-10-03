<template>

    <div v-if="loading">
        <div v-for="post in posts">
        <ContentLoader class="skeleton_div">
                <rect x="70" y="15" rx="4" ry="4" width="117" height="6.4" />
                <rect x="70" y="35" rx="3" ry="3" width="85" height="6.4" />
                <rect x="0" y="80" rx="3" ry="3" width="350" height="6.4" />
                <rect x="0" y="100" rx="3" ry="3" width="380" height="6.4" />
                <rect x="0" y="120" rx="3" ry="3" width="201" height="6.4" />
                <circle cx="30" cy="30" r="30" />
            </ContentLoader>
        </div>
        
    </div>
    
    <div v-else> 
        
        <div class="post-bar" v-for="(post, index) in posts" :key="post.idposts">
            <div class="post_topbar">
                <div class="usy-dt">
                    <img :src="post.user.pics" width="50px" height="50px" alt="">
                    <div class="usy-name">
                        <h3>{{post.user.prenom}} {{post.user.nom}}</h3>
                        <span><i class="fa fa-clock-o">{{post.created_at | moment('from', 'now')}}</i></span>
                    </div>
                </div>
                <div class="ed-opts" v-if="utilisateur.idutilisateurs===post.users_idutilisateurs">
                    <a style="cursor: pointer;" role="button"
                                aria-pressed="false" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                    <ul class="ed-options">
                        <li><a style="cursor: pointer;" role="button"
                                aria-pressed="false"
                                @click="editpost(post.idposts, index)" title="Modifier ce post"><i class="fa fa-edit"> Modifier</i></a></li>
                        <li><a style="cursor: pointer;" role="button"
                                aria-pressed="false"
                                @click="deletepost(post.idposts, index)" title="Supprimer ce post"> <i class="fa fa-trash"> Supprimer</i> </a></li>

                    </ul>
                </div>
            </div>

            <div class="job_descp">

                <p>{{post.description}}</p>
                <div v-for="img in post.media">
                    <img :src="img.libelle_media_post" width="100px">
                </div>

            </div>
            <div >
                <ul class="like-com_uno">
                    <li v-if="post.likes.length>0"><span style="margin-left: 0px;">{{post.likes.length}} <i class="fa fa-thumbs-up"></i></span></li>

                    <li v-if="post.comments.length>0"><span style="margin-left: 0px;">{{post.comments.length}} <i class="fa fa-comment"></i></span></li>
                </ul>
            </div>
            <div class="job-status-bar">
                <ul class="like-com">
                    <LikeComponent :id='post.idposts'></LikeComponent>
                    <li><a 
                        style="cursor: pointer;"
                        role="button"
                        aria-pressed="false"
                        @click="viewComment(post)"
                        title=""><i class="fa fa-comment"> Commenter</i></a></li>
                </ul>
               
            </div>

            <commentairePost 
                v-show="post.statuts" 
                :commentaires="comments" 
                :un_post="post"
                @new="saveNewCommentaire"></commentairePost>
            
    </div><!--post-bar end-->
        
    </div>

</template>


<script>
import {
  ContentLoader,
  FacebookLoader,
  CodeLoader,
  BulletListLoader,
  InstagramLoader,
  ListLoader
} from 'vue-content-loader';
import LikeComponent from './LikeComponent';
import commentairePost from './CommentairePost';

export default {
    name:"PostFeed",
    
    mounted(){
        this.get_feed()
        
    },

    

    data() {
            return {
                
                loading:true,
                comments:[],
                toggled:false,
            }
        },

    methods: {
        get_feed(){
            axios.get('/posts').then(resp =>{
                this.loading = false;
                resp.data.forEach((post) => {
                    this.$store.commit('add_post', post)
                });
                

            }).catch(function(error){
                console.log(error)
            })
        },

        

        deletepost(idp, index){

            axios.get('/deletePost/'+idp).then((data) =>{
                    this.posts.splice(index,1)
                   // console.log(data);
                    if(data.status==200){
                        this.$noty.success( 'Ce post a été supprimé avec succes.', {
                            killer: true,
                            timeout: 6000,
                            layout: 'bottomLeft'
                        });
                        return this.$store.getters.all_posts.reverse();
                    }

                }).catch(function(error){
                    console.log(error)
                })
            
            
        },

        saveNewCommentaire(message) {
                this.comments.unshift(message);
            },

        viewComment(index){
            this.comments = index.comments.reverse();
            console.log(this.comments);
            if(index.hasOwnProperty('statuts')){
                index.statuts = ! index.statuts
            }else{
                index  = Object.assign({}, index, {statuts: true})
            }
        }
    },

    computed:{
        posts(){
            
            return this.$store.getters.all_posts.reverse();
        },

        utilisateur(){
            
            return this.$store.state.auth_user;
        }
    },

    components: {
    ContentLoader,LikeComponent,commentairePost
  }
}
</script>

<style scoped>
    .skeleton_div{
        background-color: white;

        padding-top: 10px;

        padding-left: 10px;

        padding-bottom: 50px;
        margin-bottom: 10px;
    }

    ul.like-com_uno li {
		display: inline-block;
	    margin-right: 2px;
		
	}
</style>