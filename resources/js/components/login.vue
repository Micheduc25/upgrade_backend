<template>
        <div>
            <mynav></mynav>
            <div >
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
                        <input type="submit" name="login" @click.prevent="login" class="btn btn-primary" value="Login">
                    </div>
                </form>
            </div>
            <!-- <div v-else>
                <Todo v-bind:currentUser="this.$store.state.currentUser"></Todo>
            </div> -->
        </div>
</template>


<script>
import Vue from 'vue'
import axios from 'axios'
import mynav from "./mynav.vue"
import Todo from "./Todo.vue";

export default {
    name:'login',
    props:{
        //user:null
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
            //console.log('debut login ==========>>>')

            axios.post('api/login/checklogin', {username: this.username, password: this.password}).then(res => {
                console.log(res.data)
                if(res.data !== null && res.data !== ""){
                    console.log('is not null 1')
                    this.currentUser = res.data
                    this.gooduser = false
                    
                    console.log('show id ==========>>>')
                    console.log(this.currentUser.id)
                    console.log(this.$store.state.currentUser)
                    this.$store.dispatch("setGoodUser", {gusr:false})
                    this.$store.dispatch("setCurrentuser", {currentUser:this.currentUser})
                    this.$router.push({path:"/todo"})
                    this.$router.go(this.$router.currentRoute)
                    //window.location.href = "/todo/"+this.currentUser.id
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
        getGoodUser(){ //final output from here
            return this.$store.getters.getGooduserFormGetters
        },
    },
    mounted(){
        console.log('login mounted - currentUser')
        console.log(this.$store.state.currentUser)
        console.log(this.$router)
    }
}
</script>

