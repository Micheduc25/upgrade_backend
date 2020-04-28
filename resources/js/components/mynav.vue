<template>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="http://127.0.0.1:8000/" >Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" >Help</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="" @click.prevent="gotoLogin">TodoList</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Events</a>
            </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item"><a class="nav-link" href="http://127.0.0.1:8000/"><span class="glyphicon glyphicon-user" ></span> Sign Up</a></li>
                <li class="nav-item"><a class="nav-link" href="http://127.0.0.1:8000/login"><span class="glyphicon glyphicon-log-in" ></span> Login</a></li>
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
    },
    computed:{

    },
}
</script>

