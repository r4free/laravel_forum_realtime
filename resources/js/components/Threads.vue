<template>
    <div>
        <card-component v-for="(thread,index) in threads_response" :key="index" :title="thread.title"
                        :body="thread.body">
            <template slot="card-links">
                <a :href="getUrl(`thread/${thread.id}`)">{{viewText}}</a>
            </template>
        </card-component>
    </div>
</template>
<script>
    export default {
        props:{
          viewText:{
              type:String,
              default:'ver'
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
            }
        },
        mounted() {
            this.getThreads();
        }
    };
</script>

