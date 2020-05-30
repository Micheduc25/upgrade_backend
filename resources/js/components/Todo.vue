<template>
    <div>
        <div>
            <h3 v-if="isConnected" class="w-full text-center  text-teal-500 font-2xl italic font-bold welcomemsg">Welcome {{ this.currentUser.username }}</h3>
            <h3 v-else>You must <router-link to="/login">login</router-link> </h3>
            <section class="todoapp">



                
            <header class="header">
                <h1 class="mt-8">Todo</h1>
                <!-- sorting -->
                <div id="custom-select" class="flex justify-end bg-gray-200 text-blue-600 items-center">
                    <span>SortBy</span>
                    <select v-model="sortBy"
                        id="change_sortOrder"
                        class="block border-2 border-teal-200 appearance-none bg-gray-200 py-3 border-box px-4 pr-8 rounded-bl rounded-tl leading-tight focus:outline-none focus:bg-white focus:border-gray-500" >
    
                        <option v-for="(order, idx) in  sortOrder" :key="idx">{{order}}</option>
                    </select>
                        <svg class="h-4 w-4 -ml-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        <button @click="reorder" class="py-3 px-4 border-3 border-teal-200 shadow text-blue-600 font-bold bg-teal-200 rounded-br rounded-tr">sort</button>
                </div>
                <!-- container of title and priority input -->
                <div class="flex justify-center px-4 flex-wrap pt-4 mb-4">
                    <!-- title input -->

                    <div class="w-full md:w-64 px-3 mb-6 md:mb-0">
                        <label class="text-blue-800 font-bold ">
                            Title
                        </label>
                        <input v-model="todoData.ToDoTitle" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="title">
                    </div>
                    <!-- priority input -->
                    <div class="w-full md:w-64 px-3 mb-6 md:mb-0 flex flex-col items-start mb-6">
                        <label for="priority" class="text-blue-800 font-bold ">Priority</label>

                        <div id="custom-select" class="flex bg-gray-200 border border-gray-200 items-center">
                            <select v-model="todoData.selectedPriority"
                                id="priority"
                                class="block appearance-none bg-gray-200 w-full text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" >
                                <option v-for="(priority, idx) in priorities" :key="idx">{{priority}}</option>
                            </select>
                             <svg class="h-4 w-4 -ml-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>

                 </div>

                      <!-- section for input of todo details -->
                <div class="flex flex-col justify-center px-4 items-center flex-wrap">
                    <div class="w-full md:w-64 px-3 mb-6 md:mb-4"> 
                        <!-- <input type="text" class="new-todo" placeholder="Ajouter une tache" v-model="todoData. activityDetail" @keyup.enter="addTodo"> -->
                        <textarea v-model="todoData.activityDetail" name="" cols="4" id="" placeholder="Enter todo description here" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"></textarea>
                    </div>

                    <div class="flex flex-col items-center mb-6">
                        <input type="submit" name="addTodo" @click.prevent="addTodo" class="border-blue-400 border-2 px-12 py-2  rounded-bl-full rounded-tr-full bg-teal-500 hover:bg-blue-500 hover:shadow-outline text-white" value="Add Todo">
                    </div>
                </div>
            </header>

            <!-- main body starts here -->
            <div class="main">
                <input id="toggle-all" type="checkbox"  class="toggle-all" v-model="allDone">
                <label for="toggle-all">
                    Mark all as complete</label>
                <ul class="todo-list">
                    <li class="todo" :class="{completed: todoelt.completed, editing: todoelt === editing}" :key="idx" v-for="(todoelt, idx) in filteredTodos">
                        <div class="view p-2 m-1 shadow rounded" :class="[getColor(todoelt.task_priority)]">
                            <input type="checkbox" name="" class="hover:bg-blue-500 w-4 h-4 bg-blue-500 absolute z-10" v-model="todoelt.completed" @click="chageTaskState(todoelt)">
                            <todo-elt :todoelt="todoelt" @doneEdit="editTodo($event)"></todo-elt>
                            <!-- <div class="bg-gray-200 shadow"  @click="todobools[idx] =!todobools[idx]" >
                                <label class="text-gold-300 text-lg font-bold uppercase" @dblclick="editTodo(todoelt)">{{ todoelt.name }}</label>
                            </div> -->
                            <!-- <div class="bg-gray-200 shadow" v-else  @click="todobools[idx] =!todobools[idx]">
                                <label class="text-gold-300 text-lg font-bold uppercase -mb-6" @dblclick="editTodo(todoelt)">{{ todoelt.name }}</label>
                               
                                <div class="text-blue-600 w-full text-base">
                                     <label class="ml-4 justify -mb-2" @dblclick="editTodo(todoelt)">{{ todoelt.description }}</label>
                                      <label class="bg-teal-200 italic text-red-600 font-bold text-sm" @dblclick="editTodo(todoelt)">>>>>>>>>> created on:{{todoelt.end_date}}<<<<<<<<<< </label>
                                </div>

                            </div> -->
                            
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
import ToDoelt from "./todoelt.vue"

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
            todos: [],
            todobools:[],
            newTodo: '',
            filter: 'all',
            editing: null,
            oldTask: null,
            taskid: '',
            description: '',
            currentUserName:'',
            priorities: [ 'A faire', 'important', 'urgent', 'urgent et importan'],
            sortOrder:['date','name', 'priority'],
            sortBy: 'date',
            sortDirection: 'ASC',
            todoData:{
                 ToDoTitle:'',
                 activityDetail:'',
                 selectedPriority: 'A faire',
            },
            currentUser:{

            },
        }
    },
    components: {
        mynav,
        'todo-elt':ToDoelt
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
        for(var i=0; i<length(this.todos); i++){
            this.todobools[i] = true
        }
        
    },
    watch: {
        value(value){
            this.todos = value
        }
    },
    methods:{
           orderTaskByDate () {
            this.todos = this.todos.sort(function(a, b){
                var nameA=a.end_date, nameB=b.end_date
                if (nameA < nameB) //sort string ascending
                    return -1 
                if (nameA > nameB)
                    return 1
                return 0 //default return value (no sorting)
            })

        },  
        orderTaskByName () {
            this.todos = this.todos.sort(function(a, b){
                var nameA=a.name, nameB=b.name
                if (nameA < nameB) //sort string ascending
                    return -1 
                if (nameA > nameB)
                    return 1
                return 0 //default return value (no sorting)
            })
            
        },
         orderTaskByPriority () {
            this.todos = this.todos.sort(function(a, b){
                var nameA=a.task_priority, nameB=b.task_priority
                if (nameA < nameB) //sort string ascending
                    return -1 
                if (nameA > nameB)
                    return 1
                return 0 //default return value (no sorting)
            })
            
        },
        reorder(){
            if(this.sortBy=='date'){
                this.orderTaskByName()
            }
            if(this.sortBy=='name'){
                this.orderTaskByName()
            }
            if(this.sortBy=='priority'){
                this.orderTaskByPriority()
            }
        },
        getColor(val){
              
            if(val=='A faire'){
                return 'bg-green-300'
            }
            if(val=='important'){
                return 'bg-blue-300'
            }
            if(val=='urgent'){
                return 'bg-orange-300'
            }
            if(val=='urgent et importan'){
                return 'bg-red-300'
            }
    
        },
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
                            if(element.name !=='' && element.name !== undefined 
                             && element.name !==null){
                                val = element.name
                             }else{
                                 val = element.description
                             }
                             
                            let valt = element.tstate
                            if(element.tstate === "false"){
                                valt = false
                            }else if(element.tstate === "true"){
                                valt = true
                            }
                            tempTodo.push({
                                taskid: element.id,
                                name:  val,
                                description: element.description,
                                completed: valt,
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
            var today = new Date();
            var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
            var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
            var dateTime = date+' '+time; 
            axios.post(`api/addtask/${this.currentUser.id}`, {name: this.todoData.ToDoTitle, description:this.todoData.activityDetail, tstate: false, task_priority:this.todoData.selectedPriority,  end_date:dateTime}).then(res => {
                console.log(res)
                //this.actualiseTaskList()www.wi
                this.todos.push({
                    taskid: res.data.id,
                    name : this.todoData.ToDoTitle,
                    description: this.todoData.activityDetail,
                    completed: false,
                    task_priority:this.todoData.selectedPriority,
                    end_date: dateTime,

                })
                this.todoData = {ToDoTitle:'', selectedPriority:'A faire', activityDetail:''}
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
                {title:todo.name, description: todo.description, tstate: todo.completed, task_priority:todo.task_priority})
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
                {title:todo.name, description: todo.description, tstate: todo.completed, task_priority:todo.task_priority })
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
            console.log('Todos =========>>>>>>>')
            console.log(this.todos)
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
/*     

    .welcomemsg {
    animation: blink 5s 20 alternate;
    }

    @keyframes blink {
    0% { color: teal; }
    30%{ color:purple}
    70%{color:greenyellow}
    100% { color:blue; }
    } */
        #custom-select select {
        /* Hide default arrow */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        /* Style the dropdown box */
        width: 100%;
        padding: 0 10px;
        }

        #custom-select {
        position: relative;
        max-width: 400px; /* optional */
        }

        #custom-select select, #custom-select::after {
        height: 40px;
        }
        
        #custom-select::after {
        content: "\25bc"; /* HTML symbol */
        /* Reposition */
        position: absolute;
        top: 0;
        right: 0;
        padding: 0 10px;
        line-height: 40px; /* Vertical center text */
        }
</style>