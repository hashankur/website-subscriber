import { createRouter, createWebHistory } from 'vue-router'
import PostView from '../views/PostView.vue'
import WebsiteView from '../views/WebsiteView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'posts',
      component: PostView
    },
    {
      path: '/websites',
      name: 'websites',
      component: WebsiteView
    },
    {
      path: '/addPost',
      name: 'addPost',
      component: () => import('../views/AddPostView.vue')
    }
  ]
})

export default router
