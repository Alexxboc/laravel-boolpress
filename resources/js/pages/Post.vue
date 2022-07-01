<template>
    <div class="single-page">
        <div class="wrapper" v-if="!loading">


            <div class="hero_image p-5  text-light" :style="{
                backgroundImage: 'url(/storage/' + post.cover_image + ')',
                backgroundRepeat: 'no-repeat',
                backgroundSize: 'cover',
            }">
                <div class="container ">
                    <h1 class="display-3 ">{{ post.title }}</h1>
                    <hr />
                    <div class="metadata d-flex justify-content-around ">
                        <div class="category" v-if="post.category">
                            <strong> Category:</strong> {{ post.category.name }}
                        </div>
                        <!-- /.category -->

                        <div class="tags" v-if="post.tags.length > 0">
                            <strong>Tags:</strong>
                            <ul>
                                <li v-for="tag in post.tags" :key="tag.id">
                                    <span>{{ tag.name }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="no-tags" v-else>
                            <strong>Tags: N/A</strong>
                        </div>
                        <!-- /.tags -->

                        <div class="author" v-if="post.user">
                            <strong>Author:</strong> {{ post.user.name }}
                        </div>
                        <!-- /.author -->
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="content text-center py-5">
                    {{ post.content }}
                </div>
            </div>

        </div>

        <div class="loading text-center text-dark" v-else>
            ⏲️Loading....
        </div>
    </div>
</template>


<script>
export default {
    name: "Post",
    data() {
        return {
            post: "",
            loading: true
        };
    },
    mounted() {
        axios.get("/api/posts/" + this.$route.params.slug)
            .then(response => {
                //console.log(response.data)
                if(response.data.status_code == 404) {
                    console.log('404 page not found');
                    this.$router.push({name : 'not-found'});


                    
                } else {
                    console.log('page found');
                    this.post = response.data;
                    this.loading = false
                }
                
            })
            .catch((e) => {
                console.error(e);
            });
    },
};
</script>