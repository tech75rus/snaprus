<template>
  <div class="about">
    <div class="image">
      <a :href="'http://localhost' + project.imageOrigin" target="_blank">
        <img :src="'http://localhost' + project.bigImage" alt="">
      </a>
    </div>
    <div class="header">
      <h1>{{ project.name }}</h1>
    </div>
    <div class="description">
      <p>{{ project.description }}</p>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'ProjectView',
  data() {
    return {
      project: '',
    }
  },
  components: {
  },
  created() {
  },
  mounted() {
    axios.get('http://localhost/project/' + this.$route.params.id, {
      headers: {
        'token': localStorage.getItem('token'),
      }
    }).then(response => {
      localStorage.setItem('token', response.headers.token);
      this.project = response.data;
    });
  }
}
</script>

<style lang="scss" scoped>
.about {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: 700px 50px auto;
  padding: 20px 20px 20px 20px;
//  max-width: 1920px;
//  margin: 0 auto;
}
.image {
  grid-column: 1 / 3;
  width: 100%;
  height: 100%;
  img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px;
  }
}
.header {
  grid-column: 1 / 3;
  text-align: center;
  align-self: center;
}
.description {
  grid-column: 1 / 3;
  font-size: 1.2rem;
}
@media (max-width: 996px) {
  .about {
    padding: 15px 10px 20px 0;
  }
}

@media (max-width: 600px) {
  .about {
    padding: 0;
  }
  .image {
    img {
      border-radius: 0;
    }
  }
}
</style>