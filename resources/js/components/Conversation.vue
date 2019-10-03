<template>
    <div class="conversation" v-if="contact">
        <h1>{{ contact ? contact.nom : 'select a contact' }}</h1>
        <MessagesFeed :contact="contact" :messages="messages" :user="user"/>
        <MessageComposer @send="sendMessage"/>
    </div>
    <div class="conversation" v-else >
      <div class="text-center">
        <h2>Selectionner un contact</h2>
    </div>
  </div>
</template>

<script>

    import MessagesFeed from './MessagesFeed';
    import MessageComposer from './MessageComposer';
    export default {
        name: "Conversation",

        props:{
            user:{
                type:Object,
                default: null,
            },
            messages:{
              type: Array,
              default:[],
            },
          contact:{
              type:Object,
              default: null,
          },

        },

        methods:{
            sendMessage(text){
              //  console.log(text);
                //console.log(this.messages);
                //console.log(this.contact);
                if (!this.contact){
                    return;
                }

                axios.post('/sendMsg',{
                    message_input : text,
                    convID : this.messages[0].conversation_id,
                    userTo : this.contact.idutilisateurs
                }).then( (response) => {
                    console.log(response);
                    this.$emit('new', response.data);

                }).catch(function (error) {
                    console.log(error)

                })
            }
        },

        components : {MessagesFeed, MessageComposer}


    }
</script>
<style lang="scss" scoped>
    .conversation {
        flex: 5;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        h1 {
            font-size: 20px;
            padding: 10px;
            margin: 0;
            border-bottom: 1px dashed lightgray;
        }
    }
</style>
