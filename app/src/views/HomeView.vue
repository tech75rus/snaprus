<template>
  <div class="home">
    <Gallery/>
  </div>
</template>

<script>
import Gallery from "@/components/Gallery/Gallery.vue";
export default {
  name: 'HomeView',
  data() {
    return {
    }
  },
  components: {
    Gallery
  }
}
</script>

<style lang="scss">
svg {
  width: 30px;
  height: 30px;
}
.home {
  margin: 0 11%;
}
@media (min-width: 851px) {
  .home {
    margin:  0 15px;
  }
}
</style>