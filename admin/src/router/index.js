import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue';
import ProjectView from '../views/ProjectView.vue';
import AddProjectView from '../views/AddProjectView.vue';
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
    path: '/project/:id',
    name: 'project',
    meta: {
      layout: 'main'
    },
    component: ProjectView
  },
  {
    path: '/add-project',
    name: 'addProject',
    meta: {
      layout: 'main'
    },
    component: AddProjectView
  },
  {
    path: '/login',
    name: 'login',
    meta: {
      layout: 'login'
    },
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
