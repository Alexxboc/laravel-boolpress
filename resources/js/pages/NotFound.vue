<template>
  <div class="single-page">
    <div class="p-5 bg-light">
      <div class="container">
        <h1 class="display-3">Ops! Page Not found, 404</h1>
        <p class="lead">Sorry the page you requested doesn't exist.</p>
        <hr class="my-2" />
      </div>
    </div>
    <div class="content container">
      The page you requested was not found try to visit thes pages
      <ul>
        <li>
          <router-link :to="{ name: 'home' }">Home</router-link>
        </li>
        <li>
          <router-link :to="{ name: 'about' }">About</router-link>
        </li>
        <li>
          <router-link :to="{ name: 'posts' }">Posts</router-link>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: "About",
};
</script>