<template>
    <div class="comment-section">
        <commentComposer @send="sendCommentaire"></commentComposer>
        <commentFeed :comments="commentaires"></commentFeed>
										
	</div><!--comment-section end-->
</template>

<script>
import commentComposer from './CommentComposer'
import commentFeed from './CommentFeed'
export default {
    name:"CommentairePost",

    props:{
        commentaires:{
            type: Array,
            default:[],
        },
        un_post:{
            type:Object,
        },
    },

    methods:{
        sendCommentaire(text){
              //  console.log(text);
                //console.log(this.messages);
                //console.log(this.contact);
                
                //alert(text);

                axios.post('/sendCommentaire',{
                    message_input : text,
                    postID : this.un_post.idposts,
                    
                }).then( (response) => {
                    console.log(response);
                    this.$emit('new', response.data);

                }).catch(function (error) {
                    console.log(error)

                })
            }
    },

    components:{commentComposer, commentFeed},
}
</script>