<template>
  <div class="auth">
    <div class="block">
      <h2>Авторизация</h2>
      <input type="text" v-model.lazy="user" placeholder="Введите имя">
      <input type="password" v-model.lazy="password" placeholder="Введите пароль">
      <input type="submit" @click="queryAuth" value="Вход">
      <p class="message">{{ message }}</p>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Auth',
  components: {
  },
  data() {
    return {
      url: process.env.VUE_APP_URL,
      user: '',
      password: '',
      message: '',
    }
  },
  async mounted() {
  },
  methods: {
    queryAuth() {
      let form = new FormData();
      form.append('name', this.user);
      form.append('password', this.password);
      axios.post(this.url + '/api/login', form, {
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
          'Token' : localStorage.getItem('token'),
        }
      }).then(response => {
        localStorage.setItem('token', response.headers.token);
        this.message = response.data;
      }).catch(error => {
        this.message = error.response.data
      })
    }
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
