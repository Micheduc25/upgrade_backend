<template>
    <div v-if="display" @click="toogleDisplay">
        <div class="bg-gray-200 shadow">
            <div class="text-blue-600 w-full text-base">
                    <label class="ml-4 justify -mb-2" >{{ description }}</label>
                    <label class="bg-teal-200 italic text-red-600 font-bold text-sm">>>>>>>>>> created on:{{date}}<<<<<<<<<< </label>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        props:['name', 'description', 'date', 'display'],
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            toogleDisplay(){
                this.display = !this.display
                this.$emit('toogle', this.display)
            }
        }
    }
</script>
