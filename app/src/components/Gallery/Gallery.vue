<template>
  <div class="gallery" v-for="(image) in images">
    <div :class="['image-' + (index+1), 'border']" v-for="(item, index) in image" :key="index">
      <img :src="item" alt="">
    </div>
  </div>
  <div :class="['gallery-' + imagesNext[0].length]" v-for="image in imagesNext">
    <div :class="['image-' + (index+1), 'border']" v-for="(item, index) in image" :key="index">
      <img :src="item" alt="">
    </div>
  </div>
</template>

<script>
export default {
  name: 'Gallery',
  data() {
    return {
      images: [],
      imagesNext: [],
    }
  },
  mounted() {
    let arr = [
      'http://localhost/images/1.jpg',
      'http://localhost/images/2.jpg',
      'http://localhost/images/3.jpg',
      'http://localhost/images/4.jpg',
      'http://localhost/images/5.jpg',
      'http://localhost/images/6.jpg',
      'http://localhost/images/7.jpg',
      'http://localhost/images/8.jpg',
      'http://localhost/images/1.jpg',
      'http://localhost/images/2.jpg',
      'http://localhost/images/3.jpg',
      'http://localhost/images/4.jpg',
      'http://localhost/images/5.jpg',
      'http://localhost/images/6.jpg',
      'http://localhost/images/7.jpg',
      'http://localhost/images/8.jpg',
      'http://localhost/images/1.jpg',
      'http://localhost/images/2.jpg',
      'http://localhost/images/3.jpg',
      'http://localhost/images/4.jpg',
      'http://localhost/images/5.jpg',
      'http://localhost/images/6.jpg',
      'http://localhost/images/7.jpg',
      'http://localhost/images/8.jpg',
      'http://localhost/images/3.jpg',
      'http://localhost/images/4.jpg',
      'http://localhost/images/3.jpg',
//      'http://localhost/images/4.jpg',
//      'http://localhost/images/4.jpg',
    ];

    while (arr.length > 5) {
      this.images.push(arr.splice(0, 6));
    }
    this.imagesNext.push(arr.splice(0, 6))
  },
}
</script>

<style lang="scss" scoped>
@import "style";
</style>