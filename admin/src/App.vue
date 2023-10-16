<template>
  <component :is="layout">
  </component>
</template>

<script>
import MainLayout from "@/layouts/MainLayout.vue";
import LoginLayout from "@/layouts/LoginLayout.vue";
export default {
  components: {
    MainLayout,
    LoginLayout
  },
  mounted() {
  },
  computed: {
    layout() {
      return (this.$route.meta.layout === 'login') ? 'login-layout' : 'main-layout';
    }
  },
  methods: {
  }
}
</script>

<style lang="scss">
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
}

nav {
  padding: 30px;

  a {
    font-weight: bold;
    color: #2c3e50;

    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style>
