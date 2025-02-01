<template>
  <div class="auth">
    <div class="block">
      <h2>Авторизация</h2>
      <input type="text" placeholder="Введите имя">
      <input type="password" placeholder="Введите пароль">
      <input type="submit" value="Вход">
    </div>
  </div>
</template>

<script>
//import axios from 'axios';

export default {
  name: 'Auth',
  components: {
  },
  data() {
    return {
    }
  },
  async mounted() {
  }

}
</script>

<style lang="scss" scoped>
@import "src/assets/scss/input";


.auth {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  .block {
    text-align: center;
    width: 340px;
    row-gap: 20px;
    display: flex;
    flex-direction: column;
    max-width: 600px;
    height: 300px;
  }
}

</style>
