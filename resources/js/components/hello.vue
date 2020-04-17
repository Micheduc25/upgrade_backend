<template>
  <div id="app">
    <div>
      test
    </div>
  </div>
</template>

<script>


export default {
  name: 'Hello',
  data(){
    return {
      tasks:[{
        name: 'Demo',
        completed: true
      }]
    }
  },
  methods:{
    addTodo(){
      this.tasks.push({
        name: "vuejs",
        completed: false
      })
    }
  },
  components: {
  }
}
</script>
<style>

</style>
