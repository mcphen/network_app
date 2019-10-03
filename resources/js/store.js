import Vuex from 'vuex'
import Vue from 'vue'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state:{
       nots: [],
       posts:[],
       auth_user:{},
       user_network:[]
    },

    getters:{

        all_nots(state){
            return state.nots
        },

        all_nots_count(state){
            return state.nots.length
        },

        all_posts(state){
            return state.posts
        },

        all_user_network(state){
            return state.user_network
        }



    },
    
    mutations:{
        add_not(state, not){
            state.nots.push(not)
        },

        add_user_network(state, user){
            state.user_network.push(user)
        },

        add_post(state, post){
            state.posts.push(post)
        },

        auth_user_data(state, user){
            state.auth_user = user
        },

        update_post_like(state, payload){
            //console.log(state.posts)
            //console.log(payload)
            var post = state.posts.find((p)=>{
                //console.log('p \n');
                //console.log(p.idposts);
                return p.idposts === payload.id
            });

            //console.log(post);
            //console.log(payload);
            post.likes.push(payload.like);
           // console.log(post)
        },

        update_statut_user(state, payload){
            //console.log(state.posts)
            //console.log(payload)
            var post = state.user_network.find((u)=>{
                //console.log('p \n');
                //console.log(p.idposts);
                return u.idutilisateurs === payload.id
            });

            console.log(post);
            console.log(payload);
            post = payload.user;
        },

        unlike_post(state, payload){

            var post = state.posts.find((p)=>{
                return p.idposts === payload.post_id
            })

            var like = post.likes.find((l)=>{
                return l.idlikes === payload.like_id
            })

            var index = post.likes.indexOf(like)

            post.likes.splice(index, 1)
        }
    },


})