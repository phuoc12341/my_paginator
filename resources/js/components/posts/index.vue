<template>
    <div class="row align-items-center mt-3">
        <table class="table">
            <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Content</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(post, index) in listPosts">
                <th scope="row">{{ index }}</th>
                <td>{{ post.title }}</td>
                <td>{{ post.content }}</td>
                <td>
                    <router-link to="/posts/edit" class="btn btn-primary">Edit</router-link>
                <td>
                    <button type="button" class="btn btn-danger mt-3" data-toggle="modal" data-target="#exampleModal" @click="createOrUpdate = {createOrUpdate: 'create'}">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import ShowPostComponent from './ShowPostComponent.vue'
    import Common from '../../services/common.js'

    export default {
        mounted() {
            console.log('Component mounted.')
        },

        components: {
            ShowPostComponent,
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
