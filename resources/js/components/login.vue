<template>
        <form action="" method="post">
            <div class="form-group">
                <label for="uname">Username</label>
                <input type="text" name="uname" v-model="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="pwd">Password</label>
                <input type="password" name="pwd" v-model="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" name="login" id="" @click.prevent="login" class="btn btn-primary" value="Login">
            </div>
        </form>
</template>


<script>
import Vue from 'vue'
import axios from 'axios'
export default {
    props:{

    },
    data(){
        return{
            username:'',
            password:'',
        }
    },
    methods:{
        login(){
            axios.post('api/login/checklogin', {username: this.username, password: this.password}).then(res => {
                this.password = ''
            })
            .catch(err => {
                console.log(err)
            })
        }
    },
    computed:{

    },
}
</script>

