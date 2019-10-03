<template>
    <div class="comment-sec">
                    <ul>
														
						<li v-for="(comment, index) in comments">
							<div class="comment-list">
								<div class="bg-img">
									<img :src="comment.user.pics" :alt="comment.user.nom+' '+comment.user.prenom" width="40px" height="40px" >
								</div>
								<div class="comment">
									<h3>{{comment.user.prenom}} {{comment.user.nom}}</h3>
									<span><i class="fa fa-clock-o" aria-hidden="true"></i> {{comment.created_at | moment('from', 'now')}}</span>
									<p>{{comment.comment}}</p>
									
								</div>
							</div><!--comment-list end-->
						</li>
					</ul>
	</div><!--comment-sec end-->
</template>

<script>
export default {
    name:"CommentFeed",

    props:{
        comments:{
            type: Array,
            default:[],
        },
        
    },
}
</script>