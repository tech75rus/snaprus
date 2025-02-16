// src/api/axios.js
import axios from "axios";

localStorage.setItem('app', 1);

const apiClient = axios.create({
  baseURL: process.env.VUE_APP_URL,
  headers: {
    'app': localStorage.getItem('app')
  },
});

apiClient.interceptors.request.use(
  (config) => {

    const token = localStorage.getItem('token');
    if (token) {
      config.headers['token'] = token;
    }

    return config;
  },
  (error) => {
    return Promise.reject(error);
  }
)

export default apiClient;