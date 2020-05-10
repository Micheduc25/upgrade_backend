<template>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="http://todo.local/" >Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" >Help</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="" @click.prevent="gotoTodo">TodoList</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Events</a>
            </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item"><a class="nav-link" href="http://todo.local"><span class="glyphicon glyphicon-user" ></span> Sign Up</a></li>
                <li class="nav-item"><a class="nav-link" href="http://todo.local/login"><span class="glyphicon glyphicon-log-in" ></span> Login</a></li>
                <li class="nav-item"><button class="nav-link" @click.prevent="logOut"> LogOut</button></li>
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

