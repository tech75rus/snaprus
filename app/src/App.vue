<template>
  <div class="wrapper">
    <div class="menu">
      <div class="center">
        <div class="logo">
          <router-link to="/" style="text-decoration: none; color: #2c3e50;">Marina Design</router-link>
        </div>
        <div class="user">
          <p>User</p>
          <svg width="16" height="16" viewBox="0 0 16 16" fill="black" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1855 9.31764C11.7222 8.47395 12.7638 6.84046 12.7638 4.96369C12.7638 2.22232 10.5414 0 7.80008 0C5.05871 0 2.83639 2.22232 2.83639 4.96369C2.83639 6.84046 3.87798 8.47395 5.41461 9.31764H5C2.23858 9.31764 0 11.5562 0 14.3176V14.6387C0 15.191 0.447715 15.6387 1 15.6387H14.6002C15.1524 15.6387 15.6002 15.191 15.6002 14.6387V14.3176C15.6002 11.5562 13.3616 9.31764 10.6002 9.31764H10.1855Z"/>
          </svg>
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
svg {
  fill: #2c3e50;
}
#app {
//  font-family: Avenir, Helvetica, Arial, sans-serif;
  font-family: Inter-Regular,serif;
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
  z-index: 100;

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
    .user {
      display: flex;
      align-items: center;
      &>p {
        margin-right: 10px;
      }
      svg {
        width: 22px;
      }
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
