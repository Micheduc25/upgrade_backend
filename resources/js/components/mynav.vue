<template>
        <nav class="navbar navbar-expand-sm bg-dark bg-black flex pt-6 px-4 mb-6 rounded-b md:rounded-bl-full">
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
            <li class="mr-4 flex justify-center md:w-16 sm:w-1/3 w-1/2 mb-3 pb-3 border-b-2 sm:border-b-0 border-teal-700">
                <a class="text-teal-500 hover:text-white" href="" @click.prevent="gotoLogin">TodoList</a>
            </li>
            <li class="mr-4 flex justify-center md:w-12 sm:w-1/3 w-1/2 mb-3 pb-3 border-b-2 sm:border-b-0 border-teal-700">
                <a class="disabled text-teal-500 hover:text-white" href="#">Events</a>
            </li>
            <li class="mr-4 flex justify-center md:w-16 sm:w-1/3 w-1/2 mb-3 pb-3 border-b-2 sm:border-b-0 border-teal-700"><a class="text-teal-500 hover:text-white" href="http://127.0.0.1:8000"><span class="glyphicon glyphicon-user" ></span> Sign Up</a></li>
            <li class="mr-4 flex justify-center md:w-12 sm:w-1/3 w-1/2 mb-3 pb-3 border-b-2 sm:border-b-0 border-teal-700"><a class="text-teal-500 hover:text-white" href="http://127.0.0.1:8000/login"><span class="glyphicon glyphicon-log-in" ></span> Login</a></li>
            </ul>

        </nav>
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
        gotoLogin(){
            window.location.href = "/login"
            // axios({method: 'GET', url: '/api/login'}).then(
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
        gotoAbout(){
            window.location.href = "/about"
        },

    },
    computed:{

    },
}
</script>

