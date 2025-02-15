<template>
  <div class="auth">
    <form class="block" @submit.prevent="queryAuth">
      <h2>Авторизация</h2>
      <input type="text" v-model.lazy="user" placeholder="Введите имя">
      <input type="password" v-model.lazy="password" placeholder="Введите пароль">
      <input type="submit" value="Вход">
      <p class="message">{{ message }}</p>
    </form>
  </div>
</template>

<script>
import apiClient from '@/assets/js/axios';

export default {
  name: 'Auth',
  components: {
  },
  data() {
    return {
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
      apiClient.post('/api/login', form, {
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        }
      }).then(response => {
        localStorage.setItem('token', response.headers.token);
        this.message = response.data;
        this.$router.replace('/');
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
