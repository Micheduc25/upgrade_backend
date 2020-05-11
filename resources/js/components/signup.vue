<template>
        <div>
            <div>
                <form action="" method="post" class=" px-8 sm:px-4 ml-10 md:px-0">
                    <div v-if="showWarning" class="text-red-700 font-bold bg-red-100">Password does not correspond with confirm password, try again!</div>
                    <div class="flex flex-col items-start mb-6">
                        <label for="uname" class="text-blue-800 font-bold ">Username</label>
                        <input type="text" name="username" @input="showWarning=false" v-model="username" class="w-full h-10 border-2 border-blue-500 focus:shadow-outline rounded-tr sm:rounded-tr-full rounded-bl sm:rounded-bl-full sm:pl-6">
                    </div>
                    <div class="flex flex-col items-start mb-6">
                        <label for="pwd" class="text-blue-800 font-bold ">Password</label>
                        <input type="password" name="password" @input="showWarning=false" v-model="password" class="w-full h-10 border-2 border-blue-500 focus:shadow-outline rounded-tr sm:rounded-tr-full rounded-bl sm:rounded-bl-full sm:pl-6">
                    </div>
                     <div class="flex flex-col items-start mb-6">
                        <label for="confirmpassword" class="text-blue-800 font-bold ">Confirm Password</label>
                        <input type="password" name="cpassword" @input="showWarning=false" v-model="cpassword" class="w-full h-10 border-2 border-blue-500 focus:shadow-outline rounded-tr sm:rounded-tr-full rounded-bl sm:rounded-bl-full sm:pl-6">
                    </div>
                    <div class="flex flex-col items-start mb-6">
                        <input type="submit" name="signup" @click.prevent="signup" class="border-blue-400 border-2 px-12 py-2  rounded-bl-full rounded-tr-full bg-teal-500 hover:bg-blue-500 text-white" value="Sign Up">
                    </div>
                </form>
                <!-- <button class="btn btn-primary"  @click="signup">test 2</button> -->
            </div>
        </div>
</template>


<script>
import Vue from 'vue'
import axios from 'axios'
import mynav from "./mynav.vue"
import Todo from "./Todo.vue"

export default {
    //name:'signup',
    props:{

    },
    data(){
        return{
            username:'',
            password:'',
            cpassword:'',
            currentUser:null,
            gooduser:true,
            showWarning:false,
            user:true
        }
    },
    components: {
        mynav,
        Todo,
    },
    methods:{
        signup(){
            console.log(this.cpassword);
            console.log(this.password)
           if(this.cpassword==this.password){
                axios.post('api/login/register', {username: this.username, password: this.password}).then(res => {
                console.log('Component signup. testing 1')
                // this.$router.push({path:"/login"})
                // this.$router.go(this.$router.currentRoute)
                axios.post('api/login/register', {username: this.username, password: this.password}).then(res => {
                    console.log(res.data)
                    if(res.data !== null && res.data !== ""){
                        console.log('is not null 1')
                        this.currentUser = res.data
                        this.gooduser = false
                        //window.location.href = '/login'
                        this.$router.push({path:"/login", params:{user:this.currentUser}})
                        this.$router.go(this.$router.currentRoute)
                        this.$router.push({path:"/login", params:{user:this.currentUser}})
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
                    )

    }else{
              this.showWarning=true;
              console.log(this.showWarning)
              this.password = '';
              this.cpassword = '';
              
           }
    
},
computed:{

    },
    mounted() {
            console.log('Component signup mounted.')
        }
    }
}
</script>

