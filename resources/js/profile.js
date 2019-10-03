/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'

import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));


Vue.component('message-component', require('./components/MessageComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#appMessage',
    data:{
        mesg:"bonjour merci",
        listMessages :[],
        singleMessages : [],
        isVisible : false,
        userMsg :[],
        convID : '',
        userTo :'',
        message_input:'',
        chat:{
            message:[],
            user :[]
        }

    },


    ready:function(){
        this.created();
    },
    created(){
        axios.get('/getMessages').then(data =>{
            //console.log(data.data);

            this.listMessages = data.data;


        }).catch(function(error){
            console.log(error)
        })
    },

    methods:{
        viewMessages: function (idconversation) {
            //alert(idconversation);
            axios.get('/getConversation/'+idconversation ).then(data =>{
                console.log(data.data.second[0].conversation_id);
                this.isVisible = true;
                this.singleMessages = data.data.second;
                this.userMsg = data.data.first;
                this.convID = data.data.second[0].conversation_id;
                this.userTo = data.data.first.idutilisateurs;

            }).catch(function(error){
                console.log(error)
            })
        },

        sendMsg(){
            console.log('conversation'+this.convID+'/n');
            console.log('userTo'+this.userTo+'/n');

        },

        msgKeyup(){
            if(this.message_input.length !=0){
                console.log(this.chat.message.push(this.message_input));
                this.chat.message.push(this.message_input);
                this.chat.user.push('vous');


                axios.post('/sendMsg',{
                    message_input : this.message_input,
                    convID : this.convID,
                    userTo : this.userTo
                }).then( (response) => {
                    console.log(response);
                    this.message_input = '';

                    if(response.status===200){
                          //alert('ça marche');
                          // app.posts = response.data;
                        this.message_input = '';

                      }

                }).catch(function (error) {
                    console.log(error)

                })
            }
        }
    },

    mounted(){
        Echo.private('chat')
            .listen('ChatEvent', (e) => {
                this.chat.message.push(e.message);
                this.chat.user.push(e.user);
               // console.log(e);
            });
    }


});
