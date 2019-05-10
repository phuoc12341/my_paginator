<template>
  <div class="overflow-auto">

    <input class="form-control form-control-lg mt-3" type="text" placeholder="Search ..." v-model="searchUser" @change="searchPaginateUser">
        
    <div class="mt-3">
        <input type="radio" id="name" value="name" v-model="searchUserFor">
        <label for="name">Name</label><br>
        <input type="radio" id="email" value="email" v-model="searchUserFor">
        <label for="email">Email</label><br>
    </div>

    <p class="mt-3">Current Page: {{ currentPage }}</p>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Created at</th>
          <th scope="col">Updated at</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in listPaginatedUsers">
          <th scope="row">{{ item.id }}</th>
          <td>{{ item.name }}</td>
          <td>{{ item.email }}</td>
          <td>{{ item.created_at }}</td>
          <td>{{ item.updated_at }}</td>
        </tr>
      </tbody>
    </table>

    <b-pagination
        v-model="currentPage"
        :total-rows="total"
        :per-page="perPage"
        aria-controls="my-table"
        align="center"
        size="lg"
        @change="loadPagination"
    ></b-pagination>

  </div>
</template>

<script>
    import Common from '../../services/common';
    var config = Common.config();
    export default {
        data() {
            return {
                perPage: perPage,
                currentPage: currentPage,
                listPaginatedUsers: listPaginatedUsers,
                total: total,
                paginateUrl: laroute.route('users.index'),
                searchUser: '',
                searchUserFor: config.search_user_option.search_user_for,
            }
        },
        computed: {
            rows() {
                return this.listPaginatedUsers.length
            }
        },
        methods: {
            loadPagination (selectedPageNumber) {
                if (selectedPageNumber != this.currentPage) {
                    let paginateParams = {
                        page: selectedPageNumber,
                        search: this.searchUser,
                        searchUserFor: this.searchUserFor,
                    };
                    Common.paginate(this.paginateUrl, paginateParams)
                        .then( response => {
                            this.listPaginatedUsers = response.data.listPaginatedUsers;
                            this.currentPage = response.data.currentPage;
                            this.total = response.data.total;
                            this.perPage = response.data.perPage;
                        })
                        .catch(error => {
                            console.log(error);
                        })
                }      
            },
            searchPaginateUser () {
                let searchUserParams = {
                    search: this.searchUser,
                    searchUserFor: this.searchUserFor,
                };
                Common.searchUser(this.paginateUrl, searchUserParams)
                    .then( response => {
                        this.listPaginatedUsers = response.data.listPaginatedUsers;
                        this.currentPage = response.data.currentPage;
                        this.total = response.data.total;
                        this.perPage = response.data.perPage;
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            }
        }
    }
</script>
