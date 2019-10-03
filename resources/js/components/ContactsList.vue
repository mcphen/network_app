<template>
    <div class="contacts-list">
        <ul>
            <li v-for="contact in sortedContacts" :key="contact.first.idutilisateurs"
                @click="selectContact(contact.second.conversation_id)"
                :class="{'selected': contact.first == selected}">
                <div class="avatar">
                    <img :src="'img/'+contact.first.pics" :alt="contact.first.nom">
                </div>
                <div class="contact">
                    <p class="name">{{contact.first.nom}}</p>
                    <span>{{contact.second.message | fallback}}</span>
                </div>
                <span class="unread" v-if="contact.unread">{{ contact.unread }}</span>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "ContactsList",
        props:{
            contacts:{
                type:Array,
                default:[]
            }
        },

        data(){
            return {
                selected: this.contacts.length ? this.contacts[0] : null
            };
        },

        filters: {
          fallback: function(name) {
            return name.slice(0, 10);
          }
        },

        methods:{
            selectContact(contact){
                this.selected = contact;

                this.$emit('selected', contact);
            }
        },

        computed: {
            sortedContacts() {
                return _.sortBy(this.contacts, [(contact) => {
                    if (contact == this.selected) {
                        return Infinity;
                    }
                    return contact.unread;
                }]).reverse();
            }
        }
    }
</script>

<style lang="scss" scoped>
    .contacts-list {
        flex: 2;
        max-height: 600px;
        overflow: scroll;
        border-left: 1px solid #a6a6a6;

        ul {
            list-style-type: none;
            padding-left: 0;
            li {
                display: flex;
                padding: 2px;
                border-bottom: 1px solid #aaaaaa;
                height: 80px;
                position: relative;
                cursor: pointer;
                &.selected {
                    background: #dfdfdf;
                }
                span.unread {
                    background: #82e0a8;
                    color: #fff;
                    position: absolute;
                    right: 11px;
                    top: 20px;
                    display: flex;
                    font-weight: 700;
                    min-width: 20px;
                    justify-content: center;
                    align-items: center;
                    line-height: 20px;
                    font-size: 12px;
                    padding: 0 4px;
                    border-radius: 3px;
                }
                .avatar {
                    flex: 1;
                    display: flex;
                    align-items: center;
                    img {
                        width: 35px;
                        border-radius: 50%;
                        margin: 0 auto;
                    }
                }
                .contact {
                    flex: 3;
                    font-size: 10px;
                    overflow: hidden;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    p {
                        margin: 0;
                        &.name {
                            font-weight: bold;
                        }
                    }
                }
            }
        }
    }
</style>
