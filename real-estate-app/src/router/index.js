import { createRouter, createWebHistory } from 'vue-router'
import HomePage from '../components/HomePage.vue'
import About from '../components/About.vue'
import Properties from '../components/Properties.vue'
import News from '../components/News.vue'

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
  },
  {
    path: '/properties',
    name: 'PropertiesPage',
    component: Properties
  },
  {
    path: '/news',
    name: 'NewsPage',
    component: News
  }
];


const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
