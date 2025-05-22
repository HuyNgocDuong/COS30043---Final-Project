import { createRouter, createWebHashHistory } from 'vue-router'
import HomePage from '../components/HomePage.vue'
import About from '../components/About.vue'
import Properties from '../components/Properties.vue'
import News from '../components/News.vue'
import PropertyDetails from '../components/PropertyDetails.vue'

const routes = [
  { path: '/', redirect: '/home' },
  { path: '/home', name: 'Home', component: HomePage },
  { path: '/about', name: 'About', component: About },
  { path: '/properties', name: 'PropertiesPage', component: Properties },
  { path: '/news', name: 'NewsPage', component: News },
  { path: '/article/:url', name: 'ArticleDetail', component: () => import('@/components/ArticleDetail.vue') },
  { path: '/property/:id', name: 'PropertyDetails', component: PropertyDetails, props: true },
  { path: '/compare', name: 'ComparePage', component: () => import('@/components/ComparePage.vue') },
  { path: '/contact', name: 'ContactUs', component: () => import('@/components/ContactUs.vue') },
  {path: '/manage-listings', name: 'ManageListings', component: () => import('@/components/ManageListings.vue'), meta: { requiresAdmin: true }},
  { path: '/create-property', name: 'CreateProperty',component: () => import('@/components/CreateProperty.vue')}


]

const router = createRouter({
  history: createWebHashHistory(), 
  routes
})

export default router
