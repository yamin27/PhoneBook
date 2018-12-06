<template>
    <div class="modal" :class="openmodal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">{{list.name}} Details</p>
                <button class="delete" @click="close" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <label class="label">Name : <span class="has-text-success"> {{list.name}}</span></label>

                <label class="label">Email :<span class="has-text-success"> {{ list.email}}</span></label>

                <label class="label">Phone : <span class="has-text-success">{{ list.phone}} </span></label>
            </section>
            <footer class="modal-card-foot">
                <button class="button" @click="close">Cancel</button>
            </footer>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Show",
        props: ['openmodal'],

        data(){
            return{
                list: ''
            }
        },

        methods: {
            close(){
                this.$emit('closeRequest');
            }

        }
    }
</script>

<style scoped>

</style>