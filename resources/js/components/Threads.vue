<template>
    <div>
        <card-component v-for="(thread,index) in threads_response" :key="index" :title="thread.title"
                        :body="thread.body"/>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                threads_response: []
            };
        },
        mounted() {
            axios
                .get("/thread")
                .then(result => {
                    this.threads_response = result.data.data;
                })
                .catch(err => {
                });
        }
    };
</script>

