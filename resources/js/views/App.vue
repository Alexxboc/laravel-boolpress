

<template>
  <div>
    <work-in-progress></work-in-progress>
    <div class="container-fluid">
      <div class="row">
        <div class="col-10">
          <section class="posts">
            <div class="container">
              <div class="row row-cols-3 gy-4">
                <div
                  class="col"
                  v-for="post in postsResponse.data"
                  :key="post.id"
                >
                  <div class="product card h-100">
                    <img
                      :src="'storage/' + post.cover_image"
                      :alt="post.title"
                    />
                    <div class="card-body">
                      <h3>{{ post.title }}</h3>
                      <p>{{ post.content }}</p>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <span v-if="post.category">
                        <strong>Category:</strong>{{ post.category.name }}</span
                      >
                      <div class="tags" v-if="post.tags.length > 0">
                        <ul>
                          <strong>Tags:</strong>
                          <li v-for="tag in post.tags" :key="tag.id">
                            {{ tag.name }}
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <!-- /.product card -->
                </div>
                <!-- /.col-->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.container -->
            <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center">
                <li class="page-item" v-if="postsResponse.current_page > 1">
                  <a
                    class="page-link"
                    href="#"
                    aria-label="Previous"
                    @click="getAllPosts(postsResponse.current_page - 1)"
                  >
                    <span aria-hidden="true">&laquo;</span>
                    <span class="visually-hidden">Previous</span>
                  </a>
                </li>
                <li
                  :class="{
                    'page-item': true,
                    active: postsResponse.current_page == page,
                  }"
                  v-for="page in postsResponse.last_page"
                  :key="page"
                >
                  <a class="page-link" href="#" @click="getAllPosts(page)">{{
                    page
                  }}</a>
                </li>
                <li
                  class="page-item"
                  v-if="postsResponse.current_page < postsResponse.last_page"
                >
                  <a
                    class="page-link"
                    href="#"
                    aria-label="Next"
                    @click="getAllPosts(postsResponse.current_page + 1)"
                  >
                    <span aria-hidden="true">&raquo;</span>
                    <span class="visually-hidden">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </section>
          <!-- /.posts -->
        </div>
        <!-- /.col-10 -->
        <div class="col-2">
          <aside>
            <div class="categories widget">
              <h2>All Categories</h2>
              <ul class="list-unstyled">
                <li v-for="category in categoriesResponse" :key="category.id">
                  {{ category.name }}
                </li>
              </ul>
            </div>
            <div class="tags widget">
              <h2>All Tags</h2>
              <ul class="list-unstyled">
                <li v-for="tag in tagsResponse" :key="tag.id">
                  {{ tag.name }}
                </li>
              </ul>
            </div>
          </aside>
        </div>
        <!-- /.col-2 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
</template>


<script>
import WorkInProgress from "../components/WorkInProgress.vue";
export default {
  name: "App",
  components: { WorkInProgress },
  data() {
    return {
      postsResponse: "",
      categoriesResponse: "",
      tagsResponse: "",
    };
  },
  methods: {
    getAllPosts(postPage) {
      axios
        .get("/api/posts", {
          params: {
            page: postPage,
          },
        })
        .then((response) => {
          //console.log(response);
          this.postsResponse = response.data;
        })
        .catch((e) => {
          console.error(e);
        });
    },

    getAllCategories() {
      axios
        .get("/api/categories")
        .then((response) => {
          console.log(response);
          this.categoriesResponse = response.data;
        })
        .catch((e) => {
          console.error(e);
        });
    },

    getAllTags() {
      axios
        .get("/api/tags")
        .then((response) => {
          console.log(response);
          this.tagsResponse = response.data;
        })
        .catch((e) => {
          console.error(e);
        });
    },
  },
  mounted() {
    this.getAllPosts(1);
    this.getAllCategories();
    this.getAllTags();
  },
};
</script>