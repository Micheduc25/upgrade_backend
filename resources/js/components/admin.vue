<template>
  <div class="flex -mt-24 pt-20 maincontainer">
    <div class="rounded-bl w-1/3 md:border-0 border-4 border-dark flex flex-col -mt-2 pt-4 px-2 sm:px-4">
      <button @click="bProfile">Profile</button>
      <button @click="bAddUser">Add User</button>
      <button @click="bModifyUser">Modify User</button>
      <button @click="bViewUsers">View Users</button>
      <button @click="bDeleteUsers">Delet User</button>
      <button @click="bViewUserTasks">View User Task</button>

      <!-- <button>hello</button>
      <button>hello</button>
      <button>hello</button>-->
    </div>

    <!-- the section bellow is for the right handside of the screen -->
    <div class="border-4 border-dark w-2/3 -mt-2 py-2 px-2 sm:px-4">
      <div v-if="currentbtnFxn=='bProfile'">This is where the admin profile is displayed</div>

      <div v-if="currentbtnFxn=='bAddUser'">
        <!-- this is where the admin can add a user -->
        <form action method="post" class="px-2 sm:px-4 md:px-0">
          <div
            v-if="addUserData.showWarning"
            class="text-red-700 font-bold bg-red-100"
          >Password does not match with confirm password, try again!</div>
          <div class="flex flex-col items-start mb-6">
            <label for="uname" class="text-blue-800 font-bold">Username</label>
            <input
              type="text"
              name="username"
              @input="addUserData.showWarning=false"
              v-model="addUserData.userName"
              class="w-full h-8 border-2 border-blue-500 focus:shadow-outline rounded pl-2 sm:pl-4"
            />
          </div>
          <div class="flex flex-col items-start mb-6">
            <label for="pwd" class="text-blue-800 font-bold">Password</label>
            <input
              type="password"
              name="password"
              @input="addUserData.showWarning=false"
              v-model="addUserData.password"
              class="w-full h-8 border-2 border-blue-500 focus:shadow-outline rounded pl-2 sm:pl-4"
            />
          </div>
          <div class="flex flex-col items-start mb-6">
            <label for="confirmpassword" class="text-blue-800 font-bold">Confirm Password</label>
            <input
              type="password"
              name="cpassword"
              @input="addUserData.showWarning=false"
              v-model="addUserData.cpassword"
              class="w-full h-8 border-2 border-blue-500 focus:shadow-outline rounded pl-2 sm:pl-4"
            />
          </div>
          <div class="flex flex-col items-start mb-6">
            <input
              type="submit"
              name="addUser"
              @click.prevent="addUser"
              class="border-blue-400 border-2 px-12 py-2 rounded-full bg-teal-500 hover:bg-blue-500 text-white"
              value="Add user"
            />
          </div>
        </form>
      </div>

      <div v-if="currentbtnFxn=='bModifyUser'">
        <!-- this is where the admin can modify a user -->
        <div v-for="(user, idx) in users" class="shadow border-2 py-2 border-gray-300 bg-blue-200 text-center mb-2 font-bold w-full">
          <edit-tool @updatedUsers="users=$event" :users="users" :user="user" :idx="idx"></edit-tool>
        </div>
        
        
      </div>

      <div class="flex flex-col items-center"
        v-if="currentbtnFxn=='bViewUsers'"
      >
        <!-- this is where the admin can see all the users in the system -->
        <span class="text-normal md:text-xl mb-2 font-bold text-center w-full bg-dark py-4 text-teal-500 shadow border-2 border-dark">Users in the Database</span>
        <span class="text-normal md:text-xl font-bold text-center" v-if="users.length==0">Currently there is no User in the Database</span>
        <div v-for="(user, idx) in users" class="shadow border-2 py-2 border-gray-300 bg-blue-200 text-center mb-2 font-bold w-full">
          <div>
            {{user.user}}
          </div>
          <!-- <div>
            {{user.password}}
          </div> -->
        </div>
      </div>

      <div v-if="currentbtnFxn=='bDeleteUsers'" class="flex flex-col items-center">
        <!-- Here the admin can delete a user -->
        <span class="text-normal md:text-xl mb-2 font-bold text-center w-full bg-dark py-4 text-teal-500 shadow border-2 border-dark">There are {{users.length}} Users in the Database</span>
        <div v-for="(user, idx) in users" class="shadow border-2 py-2 pr-2 border-gray-300 bg-blue-200 text-center mb-2 font-bold w-full flex justify-between">
          <div class="pl-2">
            {{user.user}}
          </div>
          <div class="transform crossHolder rotate-45 -ml-4" @click="deleteUser(idx)">
            <div class="h-4 cross rounded-full bg-red-500 transform rotate-90"></div>
            <div class="h-4 cross rounded-full bg-red-500 -mt-4"></div>
          </div>
        </div>
      </div>
        
      <div
        v-if="currentbtnFxn=='bViewUserTasks'"
      >this is where the admin can view all the tasks of a particular user</div>
    </div>
  </div>
</template>

<script>
import editTool from "./adminEditUserElt.vue";
export default {
  name: "Hello",
  data() {
    return {
      tasks: [],
      users: [],
      currentbtnFxn: "bProfile",
      addUserData: {
        password: "",
        cpassword: "",
        userName: "",
        showWarning: false
      }
    };
  },
  components: {
    'edit-tool':editTool
  },
  methods: {
    // all the methods with b infont of them indicate that they are functions used by the buttons on the left
    bProfile() {
      this.currentbtnFxn = "bProfile";
    },
    bAddUser() {
      this.currentbtnFxn = "bAddUser";
    },
    bModifyUser() {
      this.currentbtnFxn = "bModifyUser";
    },
    bViewUsers() {
      this.currentbtnFxn = "bViewUsers";
    },
    bDeleteUsers() {
      this.currentbtnFxn = "bDeleteUsers";
    },
    bViewUserTasks() {
      this.currentbtnFxn = "bViewUserTasks";
    },

    // The function bellow adds a new user
    addUser() {
      if (this.addUserData.password == this.addUserData.cpassword) {
        if (this.addUserData.userName != "") {
          this.users.push({user:this.addUserData.userName, password:this.addUserData.password}),
          alert('user '+ this.addUserData.userName +' was successfully added')
          this.addUserData = {
            password: "",
            cpassword: "",
            userName: "",
            showWarning: false
          };
        } else {
          alert('Please user name cannot be empty');
        }
      } else {
        this.addUserData = {
            password: "",
            cpassword: "",
            userName: this.addUserData.userName,
          };
        this.addUserData.showWarning = true;
        
      }
    },

    // the function bellow is used to delete a user
    deleteUser(index){
      this.users.splice(index, 1)
    },
    editUser(data, idx){

    }

    
  },
  
};
</script>
<style scoped>
.maincontainer {
  min-height: 55vh;
}

button {
  border: 2px solid black;
  border-top-color: transparent;
  margin-bottom: 20px;
  padding: 10px 0;
}

button:focus {
  background-color: teal;
  border-top-color: black;
  color: white;
}
button:hover {
  background-color: darkblue;
  border-top-color: black;
  color: white;
}
input:not(:last-of-type) {
  padding-left: 8px;
}
.cross{
  width:3px;
  opacity: 0.5;
}
.crossHolder:hover .cross{
  opacity: 1;
  background-color: indigo;
}

</style>
