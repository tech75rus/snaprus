<template>
  <div class="home">
    <div class="gallery" v-for="(image) in images">
      <div :class="['image-' + (index+1)]" v-for="(item, index) in image">
        <img :src="item" alt="">
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HomeView',
  data() {
    return {
      images: []
    }
  },
  mounted() {
    let arr = [
        '../assets/images/1.jpg',
        '../assets/images/2.jpg',
        '../assets/images/3.jpg',
        '../assets/images/4.jpg',
        '../assets/images/5.jpg',
        '../assets/images/6.jpg',
        '../assets/images/1.jpg',
        '../assets/images/2.jpg',
        '../assets/images/3.jpg',
        '../assets/images/4.jpg',
        '../assets/images/5.jpg',
        '../assets/images/6.jpg',
        '../assets/images/1.jpg',
        '../assets/images/2.jpg',
        '../assets/images/3.jpg',
        '../assets/images/4.jpg',
    ];
    while (arr.length > 0) {
      this.images.push(arr.splice(0, 6));
    }
  }
}
</script>

<style lang="scss">
@import "src/assets/scss/gallery";

</style>