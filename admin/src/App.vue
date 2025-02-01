<template>
  <component :is="layout">
  </component>
</template>

<script>
import MainLayout from "@/layouts/MainLayout.vue";
import LoginLayout from "@/layouts/LoginLayout.vue";
import axios from "axios";
export default {
  data() {
    return {
    }
  },
  components: {
    MainLayout,
    LoginLayout
  },
  beforeCreate() {
    axios.get(process.env.VUE_APP_URL + '/api/is-admin', {
      headers: {
        'token': localStorage.getItem('token'),
      }
    }).catch(() => {
      // TODO сделать редирект на авторизацию
      // window.location.href = 'http://localhost:7777';
    });
  },
  created() {
  },
  mounted() {
  },
  computed: {
    layout() {
      return (this.$route.meta.layout === 'login') ? 'login-layout' : 'main-layout';
    }
  },
  methods: {
  },
}
</script>

<style lang="scss">
@import "src/assets/scss/color";

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  -webkit-tap-highlight-color: transparent; // перестает при нажатие мигать кнопка синим цветом и ссылки а может еще что:)
}
body {
  background-color: $main;
  padding-bottom: 70px;
}
*::selection {
  color: #e9e043;
//  background-color: #6a6a6a;
  background-color: #656226;
}
::placeholder {
   color: $text-placeholder;
}
input {
  all: unset;
}
textarea {
  all: unset;
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #000;
  background-color: #4d4d4d;
}
a {
  color: #e9e043;
}

</style>
