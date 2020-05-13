<template>
  <div>
    <div class="flex justify-between" v-if="!edit">
      <div>
          {{user.user}}
      </div>
        <button class="font-bold text-blue-400 hover:text-blue-600 " @click="edit=true">
            Edit
        </button>
    </div>
    <div v-else class="">
        <div class="mb-2 flex flex-col">
            <label for="username" class="text-blue-800 font-bold">Username</label>
            <input type="text" class="w-full h-8 border-2 border-blue-500 focus:shadow-outline rounded pl-2 sm:pl-4" v-model="user.user" name="username">
        </div>
         <div  class="mb-2 flex flex-col">
            <label for="password" class="text-blue-800 font-bold">Password</label>
            <input class="w-full h-8 border-2 border-blue-500 focus:shadow-outline rounded pl-2 sm:pl-4" v-model="user.password" name="password" type="text">
        </div>
    
        <input
              type="submit"
              name="addUser"
              @click.prevent="submitUserEdit"
              class="border-blue-400 border-2 px-12 py-2 rounded-full bg-teal-500 hover:bg-blue-500 text-white"
              value="Done"
            />
    </div>
    
  </div>
</template>

<script>


export default {
  props:['users', 'user','idx'],
  data(){
    return {
        edit: false,
      tasks:[{
        name: 'Demo',
        edit: false
      }]
    }
  },
  methods:{
    submitUserEdit(){
      this.users[this.idx] = this.user;
      this.$emit('updatedUsers', this.users)
      this.edit=false;
    }
  },
  components: {
  }
}
</script>
<style>

</style>
