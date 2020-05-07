<template>
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
                <li class="todo" :class="{completed: todo.completed, editing: todo === editing}" :key="todo" v-for="todo in filteredTodos">
                    <div class="view">
                        <input type="checkbox" name="" class="toggle" v-model="todo.completed" @click="chageTaskState(todo)">
                        <label @dblclick="editTodo(todo)">{{ todo.name }}</label><br>
                        <button class="destroy" @click.prevent="deleteTodo(todo)"></button>
                    </div>
                    <input type="text" class="edit" v-model="todo.name" @keyup.enter="doneEdit(todo)" @blur="doneEdit(todo)" @keyup.esc="cancelEdit" v-focus="todo === editing">
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
    </section>
</template>

<script>

import Vue from 'vue'
import axios from 'axios'

export default {
    props: {
        value: {
            type: Array, 
            default(){
                return []
            }
        }
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
        }
    },
    mounted(){
        this.getTasks()
    },
    watch: {
        value(value){
            this.todos = value
        }
    },
    methods:{
        getTasks(){
            axios({method: 'GET', url: '/api/tasks/8'}).then(
                result => {
                    let tempTodo = []
                    result.data.forEach(element => {
                        tempTodo.push({
                            taskid: element.taskid,
                            name: element.description,
                            completed: element.state === 1 ? true : false
                        })
                        this.completeTodo.push(element)
                    });
                    this.todos = tempTodo
                },
                error => {
                    console.log(error)
                },

            )
        },
        actualiseTaskList(){
            axios({method: 'GET', url: '/api/tasks/8'}).then(
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
            axios.post('api/task', {userid: 8, description: this.newTodo}).then(res => {
                this.actualiseTaskList()
                this.todos.push({
                    taskid: this.completeTodo[this.completeTodo.length-1].taskid,
                    name : this.newTodo,
                    completed: false
                })
                this.newTodo = ''
            })
            .catch(err => {
                console.log(err)
            })
            //this.$emit('input', this.todos)
        },
        deleteTodo(todo){
            //console.log(todo.taskid)
            //let currentId = this.completeTodo[this.todos.indexOf(todo)].taskid
            axios.delete(`/api/task/${todo.taskid}`)
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
            axios.put(`/api/task/${todo.taskid}`, 
                {userid:8, description: todo.name, state: todo.completed ? 1 : 0})
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
            axios.put(`/api/task/${todo.taskid}`, 
                {userid:8, description: todo.name})
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
        }
    },
    computed: {
        allDone:{
            get(){
                console.log('test')
                return this.remaining === 0
            },
            set(value){
                console.log(value)
                this.todos.forEach(todo =>{
                        todo.completed = value
                })
            }
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