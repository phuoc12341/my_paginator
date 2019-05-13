<template>
    <div class="container mt-5">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="error" v-if="errors.length">
                    <span v-for="err in errors">
                        {{ err }}
                    </span>
                    <hr>
                </div>
            </div>
        </div>
        <div class="row align-items-center mt-3">
            <router-link to="/posts/create" class="btn btn-primary mt-3">Create Post</router-link>
        </div>
    	<router-view></router-view>
    </div>
</template>

<script>
    import Common from '../../services/common.js'

    export default {
        mounted() {
            console.log('Component mounted.')
        },

        components: {
            // ShowPostComponent,
        },

        data () {
          return {
            listPosts: listPosts,
            createOrUpdate: null,
            postUpdated: null,
            posts: {
               title: '',
                content: '', 
            },
            lastPost : null,
            errors: [],
          }
        },

        mounted: function () {
            this.$router.push({ path: 'posts/index' })
            console.log('tesdcht')
            console.log(this.$router)
        },

        methods: {
          createPost (data) {
            axios.post(laroute.route('posts.store'), {
                title: this.posts.title,
                content: this.posts.content,
              })
              .then( response => {
                this.lastPost = response.data.listPosts[response.data.listPosts.length -1];
              })
              .catch( error => {
                console.log(error);
                this.errors = [];
                if(error.response.data.errors.title) {
                    this.errors.push(error.response.data.errors.title)
                };
                if(error.response.data.errors.content) {
                    this.errors.push(error.response.data.errors.content)
                }
              });
            },
            showModalUpdatePost (updateFormData) {
                this.createOrUpdate = updateFormData
            }
        }
    }
</script>
