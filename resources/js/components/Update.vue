<template>
    <div class="modal" :class="openmodal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Update Contact</p>
                <button class="delete" @click="close" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <label class="label">Name</label>
                <div class="field">
                    <div class="control">
                        <input class="input is-primary" :class="{'is-danger' : errors.name}" type="text" v-model="list.name" placeholder="Enter Name">
                        <span class="has-text-danger" v-if="errors.name">{{ errors.name[0]}}</span>
                    </div>
                </div>

                <label class="label">Email</label>
                <div class="field">
                    <div class="control">
                        <input class="input is-primary" :class="{'is-danger' : errors.email}" type="email" v-model="list.email" placeholder="Enter Email">
                        <span class="has-text-danger" v-if="errors.email">{{ errors.email[0]}}</span>
                    </div>
                </div>

                <label class="label">phone</label>
                <div class="field">
                    <div class="control">
                        <input class="input is-primary" :class="{'is-danger' : errors.phone}" type="number" v-model="list.phone" placeholder="Enetr Phone">
                        <span class="has-text-danger" v-if="errors.phone">{{ errors.phone[0]}}</span>
                    </div>
                </div>
            </section>
            <footer class="modal-card-foot">
                <button class="button is-success" @click="update">Update</button>
                <button class="button" @click="close">Cancel</button>
            </footer>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['openmodal'],

        data(){
            return {
                list:{},
                errors:{}
            }
        },

        methods:{
            close(){
                this.$emit('closeRequest');
            },

            update(){
                axios.patch(`/phonebook/${this.list.id}`,this.$data.list).then((response)=> {
                    this.close();
                })
                    .catch((error) => this.errors = error.response.data.errors)
            },

            savesds(){
                axios.post('/phonebook',this.$data.list).then((response) => {
                    this.close()
                    this.$parent.lists.push(response.data)
                    this.$parent.lists.sort(function(a,b) {
                        if (a.name > b.name) {
                            return 1;
                        }
                        elseif(a.name < b.name)
                        {
                            return -1;
                        }
                        this.list = ""
                    })
                }).catch((error) => this.errors = error.response.data.errors)
            }
        }
    }
</script>

<style scoped>

</style>