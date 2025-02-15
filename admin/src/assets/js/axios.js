// src/api/axios.js
import axios from "axios";

localStorage.setItem('app', 1);

const apiClient = axios.create({
  baseURL: process.env.VUE_APP_URL,
  headers: {
    'app': localStorage.getItem('app'),
    'token': localStorage.getItem('token')
  },
});

export default apiClient;