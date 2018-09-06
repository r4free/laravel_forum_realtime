<template>
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="#!" @click.prevent="changeLocation('pt-br')">pt-br</a></li>
        <li><a href="#!" @click.prevent="changeLocation('en')">en</a></li>
    </ul>
</template>
<script>
export default {
  methods: {
    changeLocation(locale) {
      axios
        .get(`/locale/${locale}`)
        .then(result => {
          M.toast({ html: "I am a toast" });
        })
        .catch(err => {});
    }
  },
  created() {}
};
</script>

