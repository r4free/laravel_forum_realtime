<template>
    <div id="threadsContainer">
        <card-component v-for="(thread,index) in threads_response" :key="index" :title="thread.title"
                        :body="thread.body">
            <template slot="card-links">
                <a :href="getUrl(`thread/${thread.id}`)">{{viewText}}</a>
            </template>
        </card-component>
        <form-create-thread @submit="submitedThread"></form-create-thread>
    </div>
</template>
<script>
    import FormCreateThread from './Form'
    export default {
        components:{
          FormCreateThread
        },
        props:{
          viewText:{
              type:String,
              default:'view'
          },
          alertSuccessMessage:{
              type:String,
              default:'Success'
          }
        },
        data() {
            return {
                threads_response: []
            };
        },
        methods: {
            getThreads() {
                axios
                    .get("/thread")
                    .then(result => {
                        this.threads_response = result.data.data;
                    })
                    .catch(err => {
                    });
            },
            submitedThread(){
                this.getThreads();
                this.$swal(this.alertSuccessMessage);
                document.getElementById('threadsContainer').scrollIntoView();

            }
        },
        mounted() {
            this.getThreads();
        }
    };
</script>

