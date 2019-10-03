<template>
    <li v-if="this.auth_users_likes_post">
        <a style="cursor: pointer;"
        role="button"
        aria-pressed="false"
        @click="unlike()"
        v-bind:class="getClass()">
        <i class="fa fa-thumbs-up"></i> J'aime</a>
    </li>
    <li v-else>
        <a style="cursor: pointer;"
        role="button"
        aria-pressed="false"
        @click="like()"
        v-bind:class="getClass()">
        <i class="fa fa-thumbs-up"></i> J'aime</a>
    </li>
</template>

<script>
export default {
    name:"LikeComponent", 

    props:['id'],

    methods:{
        getClass(){
            return {
                'active': this.auth_users_likes_post,  
                }
        },

        like(){
            axios.get('/like/'+this.id).then(resp =>{
                this.$store.commit('update_post_like', {
                    id: this.id,
                    like:resp.data
                });

                this.$noty.success( 'Ce post a été liké avec success.', {
                        killer: true,
                        timeout: 6000,
                        layout: 'bottomLeft'
                });

            }).catch(function(error){
                console.log(error)
            })
        },

        unlike(){
            axios.get('/unlike/'+this.id).then(resp =>{

                this.$store.commit('unlike_post', {
                    post_id: this.id,
                    like_id:resp.data
                });

                this.$noty.success( 'Vous n\'aimez plus ce post.', {
                        killer: true,
                        timeout: 6000,
                        layout: 'bottomLeft'
                });
                

            }).catch(function(error){
                console.log(error)
            })
        }
    },

    computed:{
        post(){
            return this.$store.state.posts.find((post) =>{
                return post.idposts === this.id
            })
        },

        likers(){
            var likers = [];

            this.post.likes.forEach((like) => {
                //console.log(like);
                likers.push(like.user.idutilisateurs);
            });

            return likers;
        },

        auth_users_likes_post(){
            
            var check_index = this.likers.indexOf(
                this.$store.state.auth_user.idutilisateurs
            )

            

            if(check_index === -1)
                return false;
            else
                return true;
        },
    },
}
</script>

<style scoped>
    
</style>