<template>
  <h1>Проекты</h1>
  <div class="home">
    <div class="project">
      <div class="img">
        <img src="http://localhost/images/1.jpg" alt="">
      </div>
      <h3>Project Lorem ipsum dolor sit amet consectetur adipisicing.</h3>
    </div>
    <div class="project">
      <div class="img">
        <img src="http://localhost/images/2.jpg" alt="">
      </div>
      <h3>Project Lorem ipsum dolor sit amet consectetur adipisicing.</h3>
    </div>
    <div class="project">
      <div class="img">
        <img src="http://localhost/images/3.jpg" alt="">
      </div>
      <h3>Project Lorem ipsum dolor sit amet consectetur adipisicing.</h3>
    </div>
    <div class="project">
      <div class="img">
        <img src="http://localhost/images/4.jpg" alt="">
      </div>
      <h3>Project Lorem ipsum dolor sit amet consectetur adipisicing.</h3>
    </div>
    <div class="project">
      <div class="img">
        <img src="http://localhost/images/5.jpg" alt="">
      </div>
      <h3>Project Lorem ipsum dolor sit amet consectetur adipisicing.</h3>
    </div>
    <div class="project">
      <div class="img">
        <img src="http://localhost/images/6.jpg" alt="">
      </div>
      <h3>Project Lorem ipsum dolor sit amet consectetur adipisicing.</h3>
    </div>
    <div class="project">
      <div class="img">
        <img src="http://localhost/images/7.jpg" alt="">
      </div>
      <h3>Project Lorem ipsum dolor sit amet consectetur adipisicing.</h3>
    </div>
    <div class="project">
      <div class="img">
        <img src="http://localhost/images/8.jpg" alt="">
      </div>
      <h3>Project Lorem ipsum dolor sit amet consectetur adipisicing.</h3>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HomeView',
  components: {
  }
}
</script>

<style lang="scss" scoped>
h1 {
  text-align: center;
  padding-top: 15px;
}
.home {
  padding: 30px 20px;
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
  grid-gap: 20px;
}
.project {
  border-radius: 5px;
  height: 250px;
  overflow: hidden;
  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
  transition: box-shadow .3s;
  background-color: #6a6a6a;
  cursor: pointer;
  .img {
    height: 180px;
    img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  }
  h3 {
    text-align: center;
    font-weight: 300;
    margin-top: 5px;
  }
}
.project:hover {
  box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
  h3 {
    color: #e9e043;
  }
}
</style>
