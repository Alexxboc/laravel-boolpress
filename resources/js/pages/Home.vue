<template>
  <div class="single-page">
    <div class="p-5 bg-light">
      <div class="container">
        <h1 class="display-3">Boolpress</h1>
        <p class="lead">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione,
          minima?
        </p>
        <hr class="my-2" />

        <p class="lead">
          <a
            class="btn btn-primary btn-lg"
            href="Jumbo action link"
            role="button"
            >Jumbo action name</a
          >
        </p>
      </div>
    </div>
    <section class="recent-articles">
      <div class="container">
        <h2>Recent Articles</h2>
        <div class="row row-cols-3">
          <div class="col" v-for="post in posts" :key="post.id">
            <div class="card">
              <img :src="'/storage/' + post.cover_image" alt="" />
              <div class="card-body">
                <p>
                  {{ post.content.slice(0, 200) + "..." }}
                </p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
      <div class="read_more text-center py-5">
        <router-link class="btn btn-primary" :to="{name : 'posts'}">Read More</router-link>
      </div>
      <!-- /.read_more -->
    </section>
    <!-- /.recent-articles -->
  </div>
</template>

<script>
export default {
  name: "Home",
  data() {
    return {
      posts: "",
    };
  },
  mounted() {
    axios
      .get("/api/posts")
      .then((response) => {
        console.log(response);
        const posts = response.data.data;
        this.posts = posts.slice(0, 4);
      })
      .catch((e) => {
        console.error(e);
      });
  },
};
</script>