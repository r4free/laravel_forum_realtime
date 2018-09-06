<template>
   <div >
    <form @submit.prevent="formReply()" >
        <input type="text" v-model="reply" placeholder="">
        <button type="submit">Enviar</button>
    </form>
    <preload-component v-if="this.preload"/>
    <card-component v-for="(reply,index) in this.replies.data" :key="index"  title="Reply" body="" classes="grey lighten-3" :id="index < 1 && 'lastComment'">
        <blockquote class="grey-text ascent-3" >
            {{reply.body}}
        </blockquote>
    </card-component>
    
   </div>
</template>
<script>
export default {
  props: {
    thread_id: {
      type: Number,
      required: true
    }
  },
  data() {
    return {
      preload: true,
      replies: [],
      reply: ""
    };
  },
  methods: {
    formReply() {
      axios
        .post("/reply", {
          body: this.reply,
          thread_id: this.thread_id
        })
        .then(result => {
          this.loadReplies();
          this.reply = "";
        })
        .then(() => (window.location.href = "#lastComment"))
        .catch(err => {});
    },
    loadReplies() {
      axios
        .get(`/reply/${this.thread_id}`)
        .then(result => {
          this.replies = result.data;
          this.preload = false;
        })
        .catch(err => {});
    }
  },
  mounted() {
    this.loadReplies();
  }
};
</script>

