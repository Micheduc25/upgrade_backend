export default {
    state: {
        currentUser: 0,
        task: [],
        gooduser: false
    },

    getters: {
        getTaskFormGetters(state) {
            //take parameter state

            return state.task;
        },
        getCurrentuserFormGetters(state) {
            //take parameter state
            return state.currentUser;
        },
        getGooduserFormGetters(state) {
            //take parameter state
            return state.gooduser;
        }
    },

    actions: {
        allTaskFromDatabase(context) {
            axios
                .get("api/task")
                .then(response => {
                    console.log(response.data.tasks);
                    context.commit("tasks", response.data.tasks); //tasks will be run from mutation
                })
                .catch(() => {
                    console.log("Error........");
                });
        },
        // getCurrentuser(context, id) {
        //     axios
        //         .get("api/user/" + id)
        //         .then(response => {
        //             console.log(response.data.currUser);
        //             context.commit("current_User", response.data.currUser); //currentUser will be run from mutation
        //         })
        //         .catch(() => {
        //             console.log("Error currentUser ........");
        //         });
        // },
        setCurrentuser({ commit }, user) {
            console.log("setCurrentuser context");
            console.log("user");
            console.log(user);
            //let cu = JSON.parse(window.localStorage.currentUser);
            commit("current_User", user);
        },
        setGoodUser({ commit }, gusr) {
            console.log("setGoodUser context");
            //console.log(context);
            console.log("gooduser");
            console.log(gusr);
            commit("good_User", gusr);
        },
        logout({ commit }, user) {
            console.log("logout context");
            //console.log(context);
            commit("logout_User", user);
        }
    },

    mutations: {
        tasks(state, data) {
            return (state.task = data);
        },
        current_User(state, data) {
            state.currentUser = data;
            window.localStorage.currentUser = JSON.stringify(state.currentUser);
            console.log("current_User called");
            //return state.currentUser;
        },
        good_User(state, data) {
            state.gooduser = data;
            window.localStorage.gooduser = JSON.stringify(state.gooduser);
            console.log("good_User called");
            //return state.currentUser;
        },
        logout_User(state, data) {
            state.currentUser = data;
            window.localStorage.currentUser = JSON.stringify(state.currentUser);
            console.log("logout_User called");
            //return state.currentUser;
        }
    }
};
