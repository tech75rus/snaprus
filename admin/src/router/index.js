import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue';
import ProjectView from '../views/ProjectView.vue';
import AddProjectView from '../views/AddProjectView.vue';
import PageNotFound from "@/components/PageNotFound.vue";
import Auth from '@/views/Auth.vue';
import apiClient from '@/assets/js/axios';

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
    component: Auth
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

router.beforeEach(async (to, from, next) => {
  let auth = false;
  await apiClient.post('/api/is-admin')
  .then(() => {
    auth = true;
  }).catch(() => {
    localStorage.removeItem('token');
    auth = false;
  });

  if (to.path !== '/login' && !auth) {
    next('/login');
  } else if (to.path === '/login' && auth) {
    next('/');
  } else {
    next();
  }
})

export default router
