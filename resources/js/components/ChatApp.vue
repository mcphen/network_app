<template>
    <div class="chat-app">
      <ContactsList :contacts="contacts" @selected="startConversationWith"/>
        <Conversation  :contact="selectedContact" :messages="messages" :user="user" @new="saveNewMessage"/>

    </div>
</template>

<script>
    import Conversation from './Conversation';
    import ContactsList from './ContactsList';
    export default {

        name: "ChatApp",
        props:{
            user:{
                type:Object,
                required:true,
            }
        },
        data(){
            return {
                selectedContact:null,
                messages : [],
                contacts : [],
            }
        },

        mounted(){
            //console.log(this.user);
            Echo.private(`chat.${this.user.idutilisateurs}`)
                .listen('ChatEvent', (e) => {
                    this.hanleIncoming(e.message);
                    //console.log(e.update);
                });
            axios.get('/getMessages').then(data =>{
                //console.log(data.data);

                this.contacts = data.data;


            }).catch(function(error){
                console.log(error)
            })
        },

        methods:{
            startConversationWith(contact){
                //console.log('contact '+contact);
                this.updateUnreadCount(contact, true);
                axios.get(`/getConversation/${contact}`)
                    .then(data =>{
                        //console.log("data encore "+data.data);
                        this.messages = data.data.second;
                        this.selectedContact = data.data.first;
                    /*console.log(data.data.second[0].conversation_id);
                    this.isVisible = true;
                    this.singleMessages = data.data.second;
                    this.userMsg = data.data.first;
                    this.convID = data.data.second[0].conversation_id;
                    this.userTo = data.data.first.idutilisateurs;*/

                }).catch(function(error){
                    console.log(error)
                });

                //update_status_message

                axios.get(`/update_status_message/${contact}`)
                    .then(data =>{
                        console.log(data);

                }).catch(function(error){
                    console.log(error)
                });
            },

            saveNewMessage(message) {
                this.messages.push(message);
            },

            hanleIncoming(message) {

              //console.log('message '+message);

              if (this.selectedContact && message.user_from == this.selectedContact.idutilisateurs) {
                   this.saveNewMessage(message);
                  // return;
               }
                //alert(message.message);
                //alert('userto '+message.user_to);
               this.updateUnreadCount(message.user_to, false);
            },

            updateUnreadCount(contact, reset) {
                this.contacts = this.contacts.map((single) => {

                  console.log('single '+single.first.idutilisateurs);
                  console.log('contact '+contact);
                  if (reset){
                    single.unread = 0;
                    console.log('single unread'+single.unread);
                  }else{
                    single.unread += 1;
                    console.log('single unread'+single.unread);
                  }
                    if (single.first.idutilisateurs !== contact) {
                        return single;

                    }



                    return single;
                })
            },
        },



        components : {Conversation, ContactsList}

    }
</script>

<style lang="scss" scoped>
    .chat-app {
        display: flex;
    }
</style>
