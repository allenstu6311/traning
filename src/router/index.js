import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Allen from '../views/Allen.vue'
import User from "../components/User.vue"

export const routes = [
  {
    path:'/Create',
    name:'Create',
    component: () => import(/* webpackChunkName: "post" */ '../views/Create.vue'),
  

  },
  {
    path:'/Reserve',
    name:'Reserve',
    component: () => import(/* webpackChunkName: "post" */ '../views/Reserve.vue'),
  

  },
  
  {
    path: '/',
    name: 'home',
    component: HomeView
  },

  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  },
  {
    path:'/letter',
    name:'letter',
    component: () => import(/* webpackChunkName: "post" */ '../views/Letter.vue'),

  },
  {
    path:'/parent',
    name:'parent',
    component: () => import(/* webpackChunkName: "post" */ '../views/Parent.vue'),

  },
  {
    path:'/Seven',
    name:'Seven',
    component: () => import(/* webpackChunkName: "post" */ '../views/Seven.vue'),

  },
  {
    path:'/Bike',
    name:'Bike',
    component: () => import(/* webpackChunkName: "post" */ '../views/Bike.vue'),

  },



  {
    path:'/File',
    name:'File',
    component: () => import(/* webpackChunkName: "post" */ '../views/File.vue'),

  },
  {
    path:'/Evaluation',
    name:'Evaluation',
    component: () => import(/* webpackChunkName: "post" */ '../views/Evaluation.vue'),

  },
  {
    path:'/People',
    name:'People',
    component: () => import(/* webpackChunkName: "post" */ '../views/People.vue'),

  },
  {
    path:'/Check',
    name:'Check',
    component: () => import(/* webpackChunkName: "post" */ '../views/Check.vue'),

  },
  {
    path:'/Ep1',
    name:'Ep1',
    component: () => import(/* webpackChunkName: "post" */ '../views/Ep1.vue'),

  },
  {
    path:'/Photo',
    name:'Photo',
    component: () => import(/* webpackChunkName: "post" */ '../views/Photo.vue'),

  },
  {
    path:'/ajax',
    name:'ajax',
    component: () => import(/* webpackChunkName: "post" */ '../views/Ajax.vue'),

  },
  {
    path:'/Truck',
    name:'Truck',
    component: () => import(/* webpackChunkName: "post" */ '../views/Truck.vue'),

  },
  {
    path:'/Pratice',
    name:'Pratice',
    component: () => import(/* webpackChunkName: "post" */ '../views/Pratice.vue'),

  },
  {
    path:'/Date',
    name:'Date',
    component: () => import(/* webpackChunkName: "post" */ '../views/Date.vue'),

  },
  {
    path:'/shop',
    name:'shop',
    component: () => import(/* webpackChunkName: "post" */ '../views/Shop.vue'),
    children:[
      {
        path:'/Post/:productID(\\d+)',
        name:'Post',
        component: () => import(/* webpackChunkName: "post" */ '../views/Post.vue'),
    
      },

    ]
  },
  

  {
    path: '/Allen',
    name: 'Allen',
    component: () => import(/* webpackChunkName: "Allen" */ '../views/Allen.vue'),
    children:[//路徑底下再開一層路徑
    {
      path:'photo',
      name:'allen-photo',
      component: () => import(/* webpackChunkName: "post" */ '../views/Check.vue'),

    },
  
     
      {
        path:'post',
        name:'allen-post',
        component: () => import(/* webpackChunkName: "post" */ '../views/Post.vue'),

      },

   
 
    ]
  },
 
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
