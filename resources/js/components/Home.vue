<template>
    <div>
        <nav class="panel column is-offset-2 is-8">
            <p class="panel-heading">
                VueJs PhoneBook
                <button class=" button  is-primary is-pulled-right" @click="OpenAdd">
                    <i class="fa fa-plus"></i>
                    Add new
                </button>
            </p>


            <div class="panel-block">
                <p class="control has-icons-left">
                    <input class="input is-small" type="text" placeholder="search" v-model="searchQuery">
                    <span class="icon is-small is-left">
        <i class="fas fa-search" aria-hidden="true"></i>
      </span>
                </p>
            </div>

            <a class="panel-block is-active" v-for="item,key in temp">
                <span class="column is-9">
                    {{item.name}}
                </span>
                <span class="panel-icon column is-1">
                <i class="has-text-danger fa fa-trash" area-hidden="true" @click="del(key, item.id)"></i>
            </span><span class="panel-icon column is-1">
                <i class="has-text-primary fa fa-edit" area-hidden="true" @click="updateShow(key)"></i>
            </span><span class="panel-icon column is-1">
                <i class="has-text-info fa fa-eye" area-hidden="true" @click="openShow(key)"></i>
            </span>
            </a>
            <div class="panel-block">
                <button class="button is-link is-outlined is-fullwidth">
                    reset all filters
                </button>
            </div>
        </nav>

        <Add :openmodal="addActive" @closeRequest="closeModal"></Add>
        <Show :openmodal="showActive" @closeRequest="closeModal"></Show>
        <Update :openmodal="updateActive" @closeRequest="closeModal"></Update>
    </div>
</template>

<script>

    let Add = require('./Add');
    let Show = require( './Show');
    let Update = require('./Update');

    export default {
        components: {Add, Show, Update},
        data(){
            return{
                addActive: '',
                showActive:'',
                updateActive:'',
                lists: {},
                errors:{},
                searchQuery: '',
                temp: '',
            }
        },
        watch:{
            searchQuery(){
                if (this.searchQuery.length > 0) {
                    this.temp = this.lists.filter((item) => {
                        return Object.keys(item).some((key)=>{
                            let string = String(item[key])
                            return string.toLowerCase().indexOf(this.searchQuery.toLowerCase())>-1
                        })
                    });
                    // console.log(result)
                }else{
                    this.temp = this.lists
                }
            }
        },

        mounted(){
            axios.get('/phonebook')
                .then((response) => this.lists = this.temp = response.data)
                .catch((error) => this.errors = errer.response.data.errors)
        },


        methods: {
            OpenAdd(){
                this.addActive= 'is-active';
            },

            closeModal(){
                this.addActive = this.showActive = this.updateActive = '';
            },

            openShow(key){
                this.$children[1].list = this.temp[key];
                this.showActive = 'is-active'
            },

            updateShow(key){
                this.$children[2].list = this.temp[key];
                this.updateActive = 'is-active'
            },

            del(key, id){
                if (confirm('Are you sure to delete this ?')) {
                    axios.delete(`/phonebook/${id}`)
                        .then((response) => this.lists.splice(key,1))
                        .catch((error) => this.errors = errer.response.data.errors)
                }
            },

        }
    }
</script>

<style scoped>

</style>