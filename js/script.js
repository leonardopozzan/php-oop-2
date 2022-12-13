const {createApp} = Vue;

const app = createApp({
    data(){
        return{
            viewForm: 'login'
        }
    },
    methods: {
        setView(string){
            this.viewForm = string;
        }
    },
})

app.mount('#app')