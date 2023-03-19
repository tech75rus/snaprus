<template>
  <div class="wrapper">
    <div class="menu">
      <div class="center">
        <div class="logo">
          <p>Marina design</p>
        </div>
        <div class="user">
          <p>User</p>
        </div>
      </div>
    </div>
    <router-view/>
  </div>
</template>

<style lang="scss">
* {
  margin: 0;
  padding: 0;
}
body {
  background: #f6f1ff;
}
#app {
//  font-family: Avenir, Helvetica, Arial, sans-serif;
  font-family: Inter-Regular;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
.wrapper {
  margin: 100px auto 0 auto;
  max-width: 1198px;
  min-width: 280px;
}
.menu {
  width: 100%;
  height: 70px;
  background-color: #fff;
  position: fixed;
  top: 0;
  left: 0;
  display: flex;
  box-shadow: 2px 0 12px -4px #000000;

  .center {
    margin: 0 auto;
    max-width: 1198px;
    width: 95%;
    display: flex;
    justify-content: space-between;
    align-items: center;

    .logo{
      position: relative;
    }

  }
}
@font-face {
  font-family: "Inter-Regular";
  font-weight: 400;
  font-style: normal;
  font-display: auto;
  src: local('Inter'), url("./assets/font-family/Inter-Regular.ttf") format("truetype");
}



//nav {
//  padding: 30px;
//
//  a {
//    font-weight: bold;
//    color: #2c3e50;
//
//    &.router-link-exact-active {
//      color: #42b983;
//    }
//  }
//}

</style>
