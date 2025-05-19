import { createRouter, createWebHistory } from 'vue-router'
import HomePage from '../components/HomePage.vue'
import About from '../components/About.vue'

const routes = [
  {
    path: '/',
    redirect: '/home'  
  },
  {
    path: '/home',
    name: 'Home',
    component: HomePage
  },
  {
    path: '/about',
    name: 'About',
    component: About
  }
];


const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
