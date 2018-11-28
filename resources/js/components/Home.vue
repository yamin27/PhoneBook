<template>
    <div>
        <nav class="panel column is-offset-2 is-8">
            <p class="panel-heading">
                VueJs PhoneBook
                <button class=" button  is-primary is-outlined" @click="OpenAdd">
                    <i class="fa fa-plus"></i>
                    Add new
                </button>
            </p>


            <div class="panel-block">
                <p class="control has-icons-left">
                    <input class="input is-small" type="text" placeholder="search">
                    <span class="icon is-small is-left">
        <i class="fas fa-search" aria-hidden="true"></i>
      </span>
                </p>
            </div>

            <a class="panel-block is-active">
    <span class="column is-9">
        bulma
    </span>
                <span class="panel-icon column is-1">
                <i class="has-text-danger fa fa-trash" area-hidden="true"></i>
            </span><span class="panel-icon column is-1">
                <i class="has-text-primary fa fa-edit" area-hidden="true"></i>
            </span><span class="panel-icon column is-1">
                <i class="has-text-info fa fa-eye" area-hidden="true"></i>
            </span>
            </a>
            <div class="panel-block">
                <button class="button is-link is-outlined is-fullwidth">
                    reset all filters
                </button>
            </div>
        </nav>

        <Add :openmodal="addActive" @closeRequest="closeModal"></Add>
    </div>
</template>

<script>

    let Add = require('./Add');
    export default {
        components: {Add},
        data(){
            return{
                addActive: ''
            }
        },

        methods: {
            OpenAdd(){
                this.addActive= 'is-active';
            },

            closeModal(){
                this.addActive= '';
            }

        }
    }
</script>

<style scoped>

</style>