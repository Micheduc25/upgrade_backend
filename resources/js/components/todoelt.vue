<template>
    <div>
        <div v-if="!editElt" @dblclick="editElt = true">
            <div v-if="!displayFull" @click="displayFull = true">
                <div class="bg-gray-200 shadow" >
                    <label class="text-gold-300 text-lg font-bold uppercase" >{{ todoelt.name }}</label>
                </div>
            </div>

            <div class="bg-gray-200 shadow" v-else @click="displayFull = false">
                <div class="bg-gray-200 shadow">
                    <label class="text-gold-300 text-lg font-bold uppercase -mb-6">{{ todoelt.name }}</label>
                    
                    <div class="text-blue-600 w-full text-base">
                            <label class="ml-4 justify -mb-2">{{ todoelt.description }}</label>
                            <label class="bg-teal-200 italic text-red-600 font-bold text-sm">>>>>>>>>> created on:{{todoelt.end_date}}>>>>>>>>> </label>
                    </div>

                </div>
            </div>
        </div>



        <div v-if="editElt" class="w-4/5 mx-auto pb-2 shadow px-2">
            <div class="mb-2 flex flex-col items-start justify-start">
                <label for="taskname" class="text-blue-800 text-base font-bold pl-0 -mb-4">Task name</label>
                <input type="text" class="w-full h-8 text-base border-2 border-blue-500 focus:shadow-outline rounded pl-2 sm:pl-4" v-model="todoelt.name" name="taskname">
            </div>
            <div  class="mb-2 flex flex-col items-start">
                <label for="description" class="text-blue-800 text-base font-bold pl-0 -mb-4">Task Description</label>
                <input class="w-full h-8 text-base border-2 border-blue-500 focus:shadow-outline rounded pl-2 sm:pl-4" v-model="todoelt.description" name="description" type="text">
            </div>
        
            <input
                type="submit"
                name="addUser"
                @click.prevent="submitTaskEdit"
                class="border-blue-400 border-2 px-8 py-2 rounded bg-teal-500 hover:bg-blue-500 text-base hover:shadow text-white"
                value="Done"
                />
        </div>

    </div>
</template>

<script>
    export default {
        data(){
            return{
                displayFull:false,
                editElt:false
            }
        },
        // props:['todos','todoelt','idx'],
        props:['todoelt'],
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            submitTaskEdit(){
                this.editElt = false;
                // this.todos[this.idx]= todoelt
                this.$emit('doneEdit', this.todoelt)
            }
        }
    }
</script>
<style scoped>
 
</style>
