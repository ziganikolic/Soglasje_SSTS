import { createRouter, createWebHistory } from "vue-router";
import axios from 'axios';
import SoglasjeForm from '../views/SoglasjeForm'
import Dashboard from '../views/Dashboard'
import DijakInfo from '../views/DijakInfo'
import Home from '../views/Home'
import UserSettings from '../views/UserSettings'
import GetUsers from '../views/GetUsers'

import NProgress from 'nprogress'

const routes = [
    {
        path:'/soglasje',
        name: 'soglasje.index',
        component: SoglasjeForm 
    },
    {
        path:'/dashboard',
        name: 'dashboard.index',
        component: Dashboard 
    },
    {
        path:'/dijakInfo/:id?',
        name: 'dijak.index',
        component: DijakInfo
    },
    {
        path:'/home',
        name: 'Home',
        component: Home
    },
    {
        path:'/register',
        name: 'register',
    },
    {
        path:'/userSettings',
        name: 'userSettings',
        component: UserSettings
    },
    {
        path:'/getUsers',
        name: 'getUsers',
        component: GetUsers,
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach(() => {
    NProgress.start()
  })
  
  router.afterEach(() => {
    NProgress.done()
  })

export default router;


