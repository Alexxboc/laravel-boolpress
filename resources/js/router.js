import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

// 1. Define route components.

import Home from './Pages/Home'
import About from './Pages/About'
import Posts from './Pages/Posts'
import Post from './Pages/Post'
import Contacts from "./Pages/Contacts";
import NotFound from "./Pages/NotFound";
// These can be imported from other files


// 2. Define some routes
// Each route should map to a component. The "component" can
// either be an actual component constructor created via
// `Vue.extend()`, or just a component options object.
// We'll talk about nested routes later.
const routes = [
    { path: '/', component: Home, name: 'home' },
    { path: '/about', component: About, name: 'about' },
    { path: '/posts', component: Posts, name: 'posts' },
    { path: '/posts/:slug', component: Post, name: 'post' },
    { path: '/contacts', component: Contacts, name: 'contacts' },
    { path: '/*', component: NotFound, name: 'not-found' },

]

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

// 4. Create and mount the root instance.
// Make sure to inject the router with the router option to make the
// whole app router-aware.
export default router;
// Now the app has started