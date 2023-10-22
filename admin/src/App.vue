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
  -webkit-tap-highlight-color: transparent; // перестает мигать кнопка синим цветом и ссылки а может еще что:)
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
