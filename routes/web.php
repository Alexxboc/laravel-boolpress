<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//Define /admin routes
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('posts', 'PostController')->parameters([
        'posts' => 'post:slug'
    ]);
    Route::resource('categories', 'CategoryController')->parameters([
        'categories' => 'category:slug'
    ])->except(['show', 'create', 'edit']);
    Route::resource('tags', 'TagController')->parameters([
        'tags' => 'tag:slug'
    ])->except(['show', 'create', 'edit']);
});

//Route::get('/home', 'HomeController@index')->name('home');


Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*');

/* 

    VUE ROUTER (vue router 3)

    - npm install vue-router@3

    - creare file route.js e scrivere:

    import Vue from 'vue'
    import VueRouter from 'vue-router'

    Vue.use(VueRouter)

    - nel file routes.js:
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

// 1. Define route components.

import Home from './Pages/Home'
import About from './Pages/About'
import About from './Pages/Posts'
// These can be imported from other files


// 2. Define some routes
// Each route should map to a component. The "component" can
// either be an actual component constructor created via
// `Vue.extend()`, or just a component options object.
// We'll talk about nested routes later.
const routes = [
    { path: '/', component: Home },
    { path: '/about', component: About },
    { path: '/posts', component: Posts }
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
// Now the app has started!

- Nel file front.js:


require("./bootstrap");

window.Vue = require("vue");

import App from "./views/App";
import router from './router'



const app = new Vue({
    el: "#root",
    render: (h) => h(App),
    router,
});

- in js creare cartella pages 
- creare file Home.vue

In Home.vue mettere template e script

e nello script scrivere:

export default {
    name: 'Home'
}

- nell'html fare h1 con scritto Home

- Copiare file Home.vue e chimarlo About.vue

- Sostituire le varie voci dell'export

- Fare uguale per Posts.vue

- Nel file App.vue copiare template e spostarli in Pages.vue, anche tag script (modificare nome componente da App a Post)
- Cancellare tutte i metodi e lasciare solo export

- Lanciare compilazione npm run watch

- in App.vue fare menu navigazione da home.blade.php togliamo menu di navigazione e la incollo in App.vue in alto
- Sostituire i link con componenti router-link, usare v-bind :to {name: 'home'} -> è un oggetto non moustache

- Nel file router aggiungere nomi nei componenti es: name : 'home'

- Nel bottone togliere graffe e lasciare solo il testo

- Togliere log-in e autenticazione

- Fare struttura dati :

data(){
    return {
        menu_items: [
            {
                route-name: 'home',
                route_text: 'Home'
            },

             {
                route-name: 'about',
                route_text: 'About,
            },
             {
                route-name: 'posts',
                route_text: 'Posts'
            },
        ]
        ]
        ]
    }
}

fare ciclo v-for nell' li: item in menu_items
<router-link class="nav-link" :to{name: item.route_name}>{{item.route_text}}</router-link>

- Stilizzare pagina about:

Jumbo default

nel p scrivere un lorem 10

fare un div con content e lorem 500

- Fare pagina Home:

Jumbotron Default Boolpress
nel p lorem 10

Togliere more info

Fare section con classe recent articles

Metter containern (h2 recent articles)con riga colonna e card

- Fare chiamata Ajax:

data() {
    return {
        posts: '',
    }
},

mounted() {
    axios.get('/api/posts').then(response => {
        console.log)(response)
        const posts = response.data.data
        this.posts = posts.slice(0, 4)
    }).catch(e => {
        console.error(e)
    })
}

- ciclare le colonne:
v-for="post in posts" :key=""post.id

img :src="'storage/ + post.covr_image'"
card-body 
p {{post.content.slice(0, 200) + '....'}}

a href="" Read more

agiubger pulsante:

div cllass read_more

router-link class btn btn-primary :to="{{ name: 'posts'}}"


ROTTE DINAMICHE

- in route.js aggiungere oggetto:
{
    path: '/posts/:slug',
    name: 'post',
    component: Post
}

- creare file Post.vue

template con h1 route oper vedere se funziona {{$route.params.slug}}

aggiungere script

export default {
    name: 'Post'
}

- nel read more aggiungere to:{name: 'post', params: {slug: post.slug}}

Fare chiamata ajax per singolo post

- entrare in api.php
Route::get('posts/{post:slug}', 'API/PostController@show');

- Nel post controller fare funzione show 
$post = Post::with['tags', 'category', 'user']where('slug', $slug)->first();

return $post

- entrare nel componente post

data() {
    return {
        post:'',
    }
},

mounted(){
    axios.get('api/posts/' + this.$route.params.slug).then(response => {
        //console.log(response.data)
        this.post = response.data
    }).catch(e => {
        console.error(e)
    })
}

- Nell'html cancellare h1

div classe single page

img :src"'/storage/' + post.cover_image" :alt="post.title"
h1 {{post.title}}
p {{post.content}} {{post.category.name}} 

div tags v-if"post.tags.length > 0"
ul
li v-for="tag in post.tags"  {{tag.name}}

div class no.tags v-else
strong Tags: N/A

<div class="author" v-if="post.user" >
  strong Author: {{post.user.name}}
</div>




*/