<template>
  <h1>Проекты</h1>
  <div class="home">
    <router-link :to="'/add-project'" class="project add-project">
      <div class="icon">
        <span class="line-1"></span>
        <span class="line-2"></span>
      </div>
      <span>Добавить проект</span>
    </router-link>
    <router-link :to="'/project/1'" class="project">
      <div class="img">
        <img src="http://localhost/images/1.jpg" alt="">
      </div>
      <h3>Project Lorem ipsum dolor sit amet consectetur adipisicing.</h3>
    </router-link>
    <router-link :to="'/project/2'" class="project">
      <div class="img">
        <img src="http://localhost/images/2.jpg" alt="">
      </div>
      <h3>Project Lorem ipsum dolor sit amet consectetur adipisicing.</h3>
    </router-link>
    <router-link :to="'/project/3'" class="project">
      <div class="img">
        <img src="http://localhost/images/3.jpg" alt="">
      </div>
      <h3>Project Lorem ipsum dolor sit amet consectetur adipisicing.</h3>
    </router-link>
    <router-link :to="'/project/4'" class="project">
      <div class="img">
        <img src="http://localhost/images/4.jpg" alt="">
      </div>
      <h3>Project Lorem ipsum dolor sit amet consectetur adipisicing.</h3>
    </router-link>
    <router-link :to="'/project/5'" class="project">
      <div class="img">
        <img src="http://localhost/images/5.jpg" alt="">
      </div>
      <h3>Project Lorem ipsum dolor sit amet consectetur adipisicing.</h3>
    </router-link>
    <router-link :to="'/project/6'" class="project">
      <div class="img">
        <img src="http://localhost/images/6.jpg" alt="">
      </div>
      <h3>Project Lorem ipsum dolor sit amet consectetur adipisicing.</h3>
    </router-link>
    <router-link :to="'/project/7'" class="project">
      <div class="img">
        <img src="http://localhost/images/7.jpg" alt="">
      </div>
      <h3>Project Lorem ipsum dolor sit amet consectetur adipisicing.</h3>
    </router-link>
    <router-link :to="'/project/8'" class="project">
      <div class="img">
        <img src="http://localhost/images/8.jpg" alt="">
      </div>
      <h3>Project Lorem ipsum dolor sit amet consectetur adipisicing.</h3>
    </router-link>
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
  text-decoration: none;
  color: black;
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
.add-project {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  .icon {
    width: 90px;
    height: 90px;
    background-color: #363636;
//    background-color: #4d4d4d;
    border-radius: 50px;
    margin-bottom: 20px;
    span {
      position: relative;
      display: block;
      border-radius: 3px;
      width: 55px;
      height: 9px;
      background-color: #6a6a6a;
    }
    .line-1 {
      top: 41px;
      left: 17px;
    }
    .line-2 {
      top: 33px;
      left: 17px;
      transform: rotate(90deg);
    }
  }
  &:hover span {
    color: #e9e043;
  }
}
@media (max-width: 600px) {
  .home {
    padding: 30px 10px;
    grid-gap: 10px;
  }
}
</style>
