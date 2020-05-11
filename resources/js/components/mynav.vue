<template>
    <div>
            <nav class="navbar-expand-sm bg-dark bg-black flex pt-6 px-4 mb-6 mx-auto rounded-b md:rounded-bl-full">
            <ul class="navbar-nav flex flex-wrap w-full justify-start justify-center">
            <li class="active mr-4 flex justify-center md:w-12 sm:w-1/3 w-1/2 mb-6 border-b-2 sm:border-b-0 border-teal-700">
                <a class="text-teal-500 hover:text-white" href="http://127.0.0.1:8000" >Home</a>
            </li>
            <li class="mr-4 flex justify-center md:w-12 sm:w-1/3 w-1/2 mb-3 pb-3 border-b-2 sm:border-b-0 border-teal-700">
                <a class="text-teal-500 hover:text-white" href="" @click.prevent="gotoAbout">About</a>
            </li>
            <li class=" mr-4 flex justify-center md:w-12 sm:w-1/3 w-1/2 mb-3 pb-3 border-b-2 sm:border-b-0 border-teal-700">
                <a class="text-teal-500 hover:text-white " href="#" >Help</a>
            </li>
            <!-- <li class="mr-4 flex justify-center md:w-16 sm:w-1/3 w-1/2 mb-3 pb-3 border-b-2 sm:border-b-0 border-teal-700">
                <a class="text-teal-500 hover:text-white" href="" @click.prevent="gotoLogin">TodoList</a> -->
            <li class="mr-4 flex justify-center md:w-16 sm:w-1/3 w-1/2 mb-3 pb-3 border-b-2 sm:border-b-0 border-teal-700">
                <a class="text-teal-500 hover:text-white" href="" @click.prevent="gotoTodo">TodoList</a>
            </li>
            <li class="mr-4 flex justify-center md:w-12 sm:w-1/3 w-1/2 mb-3 pb-3 border-b-2 sm:border-b-0 border-teal-700">
                <a class="disabled text-teal-500 hover:text-white" href="#">Events</a>
            </li>
            <li class="mr-4 flex justify-center md:w-16 sm:w-1/3 w-1/2 mb-3 pb-3 border-b-2 sm:border-b-0 border-teal-700"><a class="text-teal-500 hover:text-white" href="http://127.0.0.1:8000"><span class="glyphicon glyphicon-user" ></span> Sign Up</a></li>
            <li class="mr-4 flex justify-center md:w-12 sm:w-1/3 w-1/2 mb-3 pb-3 border-b-2 sm:border-b-0 border-teal-700"><a class="text-teal-500 hover:text-white" href="http://127.0.0.1:8000/login"><span class="glyphicon glyphicon-log-in" ></span> Login</a></li>
            
            <li class="mr-4 flex justify-center md:w-12 sm:w-1/3 w-1/2 mb-3 pb-3 border-b-2 sm:border-b-0 border-teal-700">
                <a class="disabled text-teal-500 hover:text-white" @click.prevent="logOut" href="#">LogOut</a>
            </li>
            </ul>
            <!-- <ul class="nav navbar-nav navbar-right">
                <li class="nav-item"><button class="nav-link" @click.prevent="logOut"> LogOut</button></li>
            </ul> -->
        </nav>
    </div>
</template>

<script>
import Vue from 'vue'
import axios from 'axios'
export default {
    props:{

    },
    data(){
        return{

        }
    },
    methods:{
        gotoTodo(){
            window.location.href = "/todo/325"
            // axios({method: 'GET', url: '/api/todo'}).then(
            //     result => {
            //         console.log(result)
            //     },
            //     error => {
            //         console.log(error)
            //     },

            // )
        },
        gotoSignup(){
            window.location.href = "/"
        },
        logOut(){
            this.$store.dispatch("logout", {gusr:false})
            this.$router.push({path:"/login"})
            this.$router.go(this.$router.currentRoute)
        }
    },
    computed:{

    },
}
</script>
