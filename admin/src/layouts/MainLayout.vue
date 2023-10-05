<template>
  <div>
    <h1>Main Layout</h1>
    <nav>
      <router-link to="/">Home</router-link> |
      <router-link to="/about">About</router-link>
    </nav>
    <Menu />

  </div>
</template>

<script>
import Menu from "@/components/Menu.vue";
export default {
  name: 'MainLayout',
  components: {
    Menu
  }
}
</script>

<style lang="scss" scoped>

</style>