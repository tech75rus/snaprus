<template>
  <div  class="gallery" v-for="(image) in images">
    <div @click="project(item.id)" :class="['image-' + (index+1), 'border']" v-for="(item, index) in image" :key="index">
      <img :src="url + item.smallImage" alt="">
      <div class="shadow"></div>
    </div>
  </div>
  <div :class="['gallery-' + imagesNext[0].length]" v-for="image in imagesNext">
    <div @click="project(item.id)" :class="['image-' + (index+1), 'border']" v-for="(item, index) in image" :key="index">
      <img :src="url + item.smallImage" alt="">
      <div class="shadow"></div>
    </div>
  </div>
</template>

<script>
import router from "@/router";
import apiClient from "@/assets/js/axios";

export default {
  name: 'Gallery',
  data() {
    return {
      images: [],
      imagesNext: [],
      testLike: false,
      url: process.env.VUE_APP_URL,
    }
  },
  created() {  
  },
  async mounted() {
    let arr = [];
    await apiClient.get('/projects').then(response => {
      arr = response.data;
      let token = response.headers.token;
      localStorage.setItem('token', token);
    }).catch(error => {
      // console.log(error);
    })
    while (arr.length > 5) {
      this.images.push(arr.splice(0, 6));
    }
    this.imagesNext.push(arr.splice(0, 6));
  },
  methods: {
    project(id) {
      if (!this.testLike) {
        router.push({path: '/project/' + id});
      }
      this.testLike = false;
    },
    like() {
      this.testLike = true;
      console.log('like one');
    },

  },
}
</script>

<style lang="scss" scoped>
@import "style";
</style>