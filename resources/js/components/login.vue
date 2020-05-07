<template>
        <div>
            <mynav></mynav>
            <div v-if="gooduser">
                <form action="" method="post">
                <div class="flex flex-col items-start mb-6">
                    <label for="uname" class="text-blue-800 font-bold ">Username</label>
                    <input type="text" name="username" v-model="username" class="w-full h-10 border-2 border-blue-500 focus:shadow-outline rounded-tr sm:rounded-tr-full rounded-bl sm:rounded-bl-full sm:pl-6">
                </div>
                <div class="flex flex-col items-start mb-6">
                    <label for="pwd" class="text-blue-800 font-bold ">Password</label>
                    <input type="password" name="password" v-model="password" class="w-full h-10 border-2 border-blue-500 focus:shadow-outline rounded-tr sm:rounded-tr-full rounded-bl sm:rounded-bl-full sm:pl-6">
                </div>
                <div class="flex flex-col items-start mb-6">
                    <input type="submit" name="login" @click.prevent="login" class="border-blue-400 border-2 px-12 py-2  rounded-bl-full rounded-tr-full bg-teal-500 hover:bg-blue-500 text-white" value="Login">
                </div>
            </form>
            </div>
            <div v-else>
                <Todo v-bind:currentUser="currentUser"></Todo>
            </div>
        </div>
</template>


<script>
import Vue from 'vue'
import axios from 'axios'
import mynav from "./mynav.vue"
import Todo from "./Todo.vue";

export default {
    name:'Login',
    props:{

    },
    data(){
        return{
            username:'',
            password:'',
            currentUser:null,
            gooduser:true,
        }
    },
    components: {
        mynav,
        Todo,
    },
    methods:{
        login(){
            axios.post('api/login/checklogin', {username: this.username, password: this.password}).then(res => {
                console.log(res.data)
                if(res.data !== null && res.data !== ""){
                    console.log('is not null 1')
                    this.currentUser = res.data
                    this.gooduser = false
                }else if(res.data === ""){
                    console.log('is empty')
                }else{
                    console.log('not null')
                }
                // if(res.data.username !== null){
                //     //console.log(res.data)
                //     this.currentUsername = res.data.username
                //     window.location.href = '/welcome';//, res.data.username]
                // }else{
                //     console.log('Login ou mot de passe incorrect')
                // }
                this.password = ''
                //window.location.href = "/"
                //router.push('/')
            })
            .catch(err => {
                console.log(err+" ---> ERROR")
            })
        }
    },
    computed:{

    },
}
</script>

