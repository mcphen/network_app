<template>
    <div class="post-comment">
					<div class="cm_img">
						<img :src="user.pics" width="40px" height="40px" alt="">
					</div>
					<div class="comment_box">
                        
                            <input v-model="commentaire" @keydown.enter="send" type="text" placeholder="Ajouter un commentaire...">
                           
                        
				    </div>
	</div><!--post-comment end-->
</template>

<script>
export default {
    name:"CommentComposer",
    data() {
        return {
            user : this.$store.state.auth_user, 
            commentaire:''
        }
    },

    methods:{
            send(e){
                e.preventDefault();
                if(this.commentaire==''){
                    return;
                }
                this.$emit('send',this.commentaire);
                this.commentaire='';
            }
    }
}
</script>