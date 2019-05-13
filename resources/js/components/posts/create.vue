<template>
    <div class="show-post  mt-5">
        <div class="row align-items-center">
            <div class="col-4">
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                </div>
            </div>
            <div class="col-4">
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                </div>
            </div>
            <div class="col-2 text-center">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" @click="$emit('showModalUpdatePost', {createOrUpdate: 'update', id: post.id})">
                  Create
                </button>
            </div>
        </div>
    </div>
</template>

<script>

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
