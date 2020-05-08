<template>
        <div>
            <div>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="uname">Username</label>
                        <input type="text" name="username" v-model="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password</label>
                        <input type="password" name="password" v-model="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="signup" @click.prevent="signup" class="btn btn-primary" value="Sign Up">
                    </div>
                </form>
            </div>
        </div>
</template>


<script>
import Vue from 'vue'
import axios from 'axios'
import mynav from "./mynav.vue"
import Todo from "./Todo.vue";

export default {
    //name:'Signup',
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
        signup(){
            axios.post('api/login/register', {username: this.username, password: this.password}).then(res => {
                console.log(res.data)
                if(res.data !== null && res.data !== ""){
                    console.log('is not null 1')
                    this.currentUser = res.data
                    this.gooduser = false
                    window.location.href = '/login'
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

