<template>
    <div>
        <div>
            <h3 v-if="isConnected">Welcome {{ this.currentUser.username }}</h3>
            <h3 v-else>You must <router-link to="/login">login</router-link> </h3>
            <section class="todoapp">
            <header class="header">
                <h1>Todo</h1>
                <input type="text" class="new-todo" placeholder="Ajouter une tache" 
                v-model="newTodo" @keyup.enter="addTodo">
            </header>
            <div class="main">
                <input id="toggle-all" type="checkbox"  class="toggle-all" v-model="allDone">
                <label for="toggle-all">
                    Mark all as complete</label>
                <ul class="todo-list">
                    <li class="todo" :class="{completed: todoelt.completed, editing: todoelt === editing}" :key="idx" v-for="(todoelt, idx) in filteredTodos">
                        <div class="view">
                            <input type="checkbox" name="" class="toggle" v-model="todoelt.completed" @click="chageTaskState(todoelt)">
                            <label @dblclick="editTodo(todoelt)">{{ todoelt.name }}</label>
                            <button class="destroy" @click.prevent="deleteTodo(todoelt)"></button>
                        </div>
                        <input type="text" class="edit" v-model="todoelt.name" @keyup.enter="doneEdit(todoelt)" @blur="doneEdit(todoelt)" @keyup.esc="cancelEdit" v-focus="todoelt === editing">
                    </li>
                </ul>
            </div>
            <footer class="footer" v-show="hasTodos">
                <span class="todo-count">
                    <strong>{{ remaining }}</strong> taches a faire
                </span>
                <ul class="filters">
                    <li><a href="#" :class="{selected: filter === 'all'}" @click.prevent="filter = 'all'">All task</a></li>
                    <li><a href="#" :class="{selected: filter === 'todo'}" @click.prevent="filter = 'todo'">To do</a></li>
                    <li><a href="#" :class="{selected: filter === 'done'}" @click.prevent="filter = 'done'">Done</a></li>
                </ul>
                <button class="clear-completed" @click.prevent="deleteCompleted" v-show="doneTask">Delete completed tasks</button>
            </footer>
            <br>
        </section>
        </div>
        <!-- <div v-else>
            <Login></Login>
        </div> -->
    </div>
</template>

<script>

import Vue from 'vue'
import axios from 'axios'
//import Login from "./login.vue"
import mynav from "./mynav.vue"

export default {
    name:'Todo',
    props: {
        value: {
            type: Array, 
            default(){
                return []
            }
        },
        // currentUser:{

        // },
    },
    data(){
        return {
            completeTodo:[],
            todos: this.value,
            newTodo: '',
            filter: 'all',
            editing: null,
            oldTask: null,
            taskid: '',
            description: '',
            currentUserName:'',
            currentUser:{

            },
        }
    },
    components: {
        mynav,
    },
    beforeMount(){
        console.log("Getting user before mount")
        console.log(this.getCurrentUser)
        //this.currentUser = this.getCurrentUser.user;
        console.log("Getting Store before mount")
        //this.$store1.setState(this.$store.state)
        console.log(this.$store.state.currentUser)
    },
    mounted(){
        console.log('Mounted all')
        console.log(this.$store.state.currentUser)
        console.log("window.local test =-====>")
        console.log(JSON.parse(window.localStorage.currentUser))
        this.currentUser = JSON.parse(window.localStorage.currentUser).currentUser
        this.getTasks()
    },
    watch: {
        value(value){
            this.todos = value
        }
    },
    methods:{
        getTasks(){
            console.log(this.currentUser.username)
            axios({method: 'GET', url: `/api/tasks/${this.currentUser.id}`}).then(
                result => {
                    console.log(result.data)
                    if(result.data !== "" && result.data !== null){
                        //this.gooduser = true
                        //this.currentUser = result.data
                        //this.currentUserName = this.currentUser.username
                        let tempTodo = []
                        result.data.forEach(element => {
                            let val = ''
                            if(element.description !=='' && element.description !== undefined 
                             && element.description !==null){
                                val = element.description
                             }else{
                                 val = element.title
                             }
                            tempTodo.push({
                                taskid: element.id,
                                name:  val,
                                completed: element.tstate, // === 1 ? true : false
                                task_priority: element.task_priority,
                                end_date: element.end_date,
                            })
                            this.completeTodo.push(element)
                        });
                        this.todos = tempTodo
                        //console.log(this.gooduser)
                    }else{
                        console.log('Aucune tache')
                        //console.log(this.gooduser)
                        //console.log(result.data)
                        console.log(result)
                        //getCurrentUser
                        //window.location.href = '/'
                    }
                    
                },
                error => {
                    console.log(error)
                },

            )
        },
        actualiseTaskList(){
            axios({method: 'GET', url: `/api/tasks/${this.currentUser.id}`}).then(
                result => {
                    result.data.forEach(element => {
                        this.completeTodo.push(element)
                    });
                },
                error => {
                    console.log(error)
                },

            )
        },
        addTodo(){   
            axios.post(`api/addtask/${this.currentUser.id}`, {title: '', description:this.newTodo, tstate: false, task_priority:'to do',  end_date:''}).then(res => {
                console.log(res)
                //this.actualiseTaskList()
                this.todos.push({
                    taskid: res.data.id,
                    name : this.newTodo,
                    completed: false,
                    task_priority:'to do',
                    end_date: '',
                })
                this.newTodo = ''
            })
            .catch(err => {
                console.log(err)
            })
            //this.$emit('input', this.todos)
        },
        deleteTodo(todo){
            console.log(todo.taskid)
            //let currentId = this.completeTodo[this.todos.indexOf(todo)].taskid
            axios.delete(`/api/destroytask/${todo.taskid}/${this.currentUser.id}`)
            .then(res => {
                this.todos = this.todos.filter(t => t !== todo)
                this.$emit('input', this.todos)
                //this.actualiseTaskList()
            })
            .catch(err => {
                alert("Erreur de suppression ! Veuillez reessayer.")
                console.log(err)
                //this.actualiseTaskList()
            })
        },
        deleteCompleted(){
            this.todos = this.todos.filter(todo => !todo.completed)
            this.$emit('input', this.todos)
        },
        editTodo(todo){
            this.editing = todo
            this.oldTask = todo.name
        },
        chageTaskState(todo){
            todo.completed = !todo.completed
            console.log('todo.name')
            console.log(todo.name)
            console.log(todo)
            axios.put(`/api/updatetask/${todo.taskid}`, 
                {title:'', description: todo.name, tstate: todo.completed, task_priority:'to do', end_date:'' })
                .then(res => {
                    //this.editing = null
                })
                .catch(err => {
                    console.log(err)
                }
            )
        },
        doneEdit(todo){
            //console.log(this.completeTodo.find(todo))
            //this.actualiseTaskList()
            //console.log(todo.name)
            // console.log(this.todos.indexOf(todo))
            // console.log(this.completeTodo[this.todos.indexOf(todo)].taskid)
            //let currentId = this.completeTodo[this.todos.indexOf(todo)].taskid
            axios.put(`/api/updatetask/${todo.taskid}`, 
                {title:'', description: todo.name, tstate: todo.completed, task_priority:'to do',  end_date:'' })
                .then(res => {
                    this.editing = null
                })
                .catch(err => {
                    console.log(err)
                }
            )
            
        },
        cancelEdit(){
            this.editing.name = this.oldTask
            this.editing = null
        },
        
    },
    computed: {
        allDone:{
            get(){
                return this.remaining === 0
            },
            set(value){
                this.todos.forEach(todo =>{
                        todo.completed = value
                })
            }
        },
        getCurrentUser(){ //final output from here
            return this.$store.getters.getCurrentuserFormGetters
        },
        isConnected(){
            return this.currentUser !== undefined ? true : false
        },
        hasTodos(){
            return this.todos.length > 0
        },
        doneTask(){
            return this.todos.filter(todo => todo.completed).length > 0
        },
        remaining(){
            return this.todos.filter(todo => !todo.completed).length
        },
        filteredTodos(){
            if(this.filter === 'todo'){
                return this.todos.filter(todo => !todo.completed)
            }else if(this.filter === 'done'){
                return this.todos.filter(todo => todo.completed)
            }
            return this.todos
        }
    },
    directives: {
        focus(el, value){
            if(value){
                Vue.nextTick(()=>{
                    el.focus
                })
            }
        }
    }
}
</script>

<style src="./todo.css">

</style>