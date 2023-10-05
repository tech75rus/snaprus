import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import PageNotFound from "@/components/PageNotFound.vue";

const routes = [
  {
    path: '/',
    name: 'home',
    meta: {
      layout: 'main'
    },
    component: HomeView
  },
  {
    path: '/login',
    name: 'login',
    meta: {
      layout: 'login'
    },
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: function () {
      return import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
    }
  },
  {
    path: '/:pathMatch(.*)*',
    component: PageNotFound
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
